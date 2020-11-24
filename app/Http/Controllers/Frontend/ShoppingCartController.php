<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPostPayRequest;
use App\Models\Coupon;
use App\Services\ShoppingCartService\PayManager;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ShoppingCartController extends Controller
{

    //thanh toán online
    private $vnp_TmnCode = "0M8H13SJ"; //mã của website khi đăng ký
    private $vnp_HashSecret = "QXKLHHCYFAALOUNFUCZLHRTYRHOQIEQV"; //Chuỗi bí mật để kiểm tra
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; //url thanh toán
    private $vnp_Returnurl = "http://localhost:8000/shopping/form-online";

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        $shopping = \Cart::content();
        $viewData = [
            'title_page' => 'Danh sách giỏ hàng',
            'shopping'   => $shopping,
        ];
        return view('frontend.pages.shopping.index', $viewData);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function add($id)
    {
        $product = Product::find($id);
        $price = $product->pro_price;

        //1. Kiểm tra tồn tại sản phẩm
        if (!$product) {
            //return redirect()->to('/');
            return json_encode(['error' => 1, 'msg' => 'Sản phẩm không tồn tại']);
        }

        // 2. Kiểm tra số lượng sản phẩm
        if ($product->pro_number < 1) {
            //4. Thông báo
//            \Session::flash('toastr', [
//                'type'    => 'error',
//                'message' => 'Số lượng sản phẩm không đủ'
//            ]);
//            return redirect()->back();
            return json_encode(['error' => 1, 'msg' => 'Số lượng sản phẩm không đủ']);
        }
        $cart = \Cart::content();
        $idCartProduct = $cart->search(function ($cartItem) use ($product) {
            if ($cartItem->id == $product->id) {
                return $cartItem->id;
            }
        });
        if ($idCartProduct) {
            $productByCart = \Cart::get($idCartProduct);
            if ($product->pro_number < ($productByCart->qty + 1)) {
//                \Session::flash('toastr', [
//                    'type'    => 'error',
//                    'message' => 'Số lượng sản phẩm không đủ'
//                ]);
//                return redirect()->back();
                return json_encode(['error' => 1, 'msg' => 'Số lượng sản phẩm không đủ']);
            }
        }

        //kiểm tra xem sản phẩm có trong flash sale không ?
        $flash_deal = FlashSale::where('fs_status', 1)->first();
        if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->fs_start_date && strtotime(date('d-m-Y')) <= $flash_deal->fs_end_date && FlashSaleProduct::where('fsp_flash_deal_id',
                $flash_deal->id)->where('fsp_product_id', $product->id)->first() != null) {
            $flash_deal_product = FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id',
                $product->id)->first();
            $price -= ($price * $flash_deal_product->fsp_discount) / 100;
            $sale = $flash_deal_product->fsp_discount;
        } else {
            $price -= ($price * $product->pro_sale) / 100;
            $sale = $product->pro_sale;
        }

        // 3. Thêm sản phẩm vào giỏ hàng
        \Cart::add([
            'id'      => $product->id,
            'name'    => $product->pro_name,
            'qty'     => 1,
            'price'   => $price,
            'weight'  => '1',
            'options' => [
                'sale'      => $sale,
                'price_old' => $product->pro_price,
                'image'     => $product->pro_avatar
            ]
        ]);

        //4. Thông báo
//        \Session::flash('toastr', [
//            'type'    => 'success',
//            'message' => 'Thêm giỏ hàng thành công'
//        ]);

        return json_encode(['error' => 0, 'msg' => 'Thêm giỏ hàng thành công','cartCount' => \Cart::count() ]);
    }

    /**
     * @param AdminPostPayRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function postPay(AdminPostPayRequest $request)
    {
        Cache::forget('HOME.PRODUCT_PAY');
        $data = $request->except("_token");
        //kiểm tra user đăng nhập chưa
        if (!\Auth::user()->id) {
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Đăng nhập để thực hiện tính năng này'
            ]);

            return redirect()->back();
        }

        // Lấy thông tin đơn hàng
        $products = \Cart::content();
        try {
            DB::beginTransaction();
            /*new PayManager($data, $shopping, $options);*/

            //check mã giảm giá để lưu
            if (session('coupon')) {
                $subtotal = str_replace(',', '', \Cart::subtotal(0));
                $coupon = Coupon::select('*')->where('cp_code', session('coupon'))->first();
                $price = (($coupon->cp_discount) * $subtotal) / 100;
                $priceSale = number_format($price, 0, ',', '.');
            }

            $totalCard = !empty(session('coupon')) ? session('cartUpdateTotal') : str_replace(',', '', \Cart::subtotal(0));
            $totalCardConvert = str_replace(',', '', $totalCard);
            $totalMoney = str_replace(',', '', (int)$totalCardConvert) + (int)Product::SHIPPING_COST;
            //lưu bảng transactions
            $transacionID = Transaction::insertGetId([
                'tst_user_id'     => \Auth::user()->id,
                'tst_total_money' => $totalMoney,
                'tst_admin_id' => get_data_user('admins'),
                'tst_name'        => $request->tst_name,
                'tst_email'       => $request->tst_email,
                'tst_phone'       => $request->tst_phone,
                'tst_address'     => $request->tst_address,
                'tst_note'        => $request->tst_note ? $request->tst_note : '',
                'tst_type'        => $request->tst_type,
                'tst_coupon_id'   => isset($coupon) ? $coupon->id : '',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now()
            ]);
            //Lưu bảng orders
            if ($transacionID) {
                foreach ($products as $product) {
                    Order::insert([
                        'od_transaction_id' => $transacionID,
                        'od_product_id'     => $product->id,
                        'od_sale'           => $product->options->sale,
                        'od_qty'            => $product->qty,
                        'od_price'          => $product->price,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now()
                    ]);
                }
            }
            // Lưu bảng coupon_usages
            if(isset($coupon)) {
                DB::table('coupon_usages')->insertGetId(
                    array(
                        'cpu_user_id'   => \Auth::user()->id,
                        'cpu_coupon_id' => $coupon->id
                    )
                );
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("[Errors pay shopping cart]" . $exception->getMessage());
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Có lỗi xảy ra không mong muốn, mời bạn thử lại sau'
            ]);
            $request->session()->forget('cartUpdateTotal');
            $request->session()->forget('coupon');
            return redirect()->to('/');
        }
        //gửi mail cho khách hàng khi thanh toán offline
        if ($request->tst_type == 1) {
            try {
                $subject = "Thư cảm ơn mua hàng";
                $name = $request->tst_name;
                $data = array(
                    'name'       => $name,
                    'totalMoney' => (int)$totalMoney,
                    'code'       => isset($coupon) ? $coupon->cp_code : '',
                    'discount'   => isset($coupon) ? $coupon->cp_discount : '',
                    'priceSale'  => isset($coupon) ? $priceSale : '',
                );
                $email = $request->tst_email;
                Mail::send('emails.email_order_offline', $data, function ($message) use ($email, $subject, $name) {
                    $message->to($email, $name)
                        ->subject($subject);
                    $message->from(env('MAIL_USERNAME'), 'Beauty Store');
                });
                //un session card
                \Cart::destroy();
                $request->session()->forget('cartUpdateTotal');
                $request->session()->forget('coupon');
                \Session::flash('toastr', [
                    'type'    => 'success',
                    'message' => 'Đơn hàng của bạn đã được lưu, bạn có thể theo dõi đơn hàng trong email'
                ]);
                return redirect()->route('get.user.tracking_order', $transacionID);
            } catch (\Exception $exception) {
                Log::error("[Send mail offline error]" . $exception->getMessage());
                \Session::flash('toastr', [
                    'type'    => 'error',
                    'message' => 'Có lỗi xảy ra không mong muốn, mời bạn thử lại sau'
                ]);
                return redirect()->to('/');
            }
        } else {
            //thanh toan online
            $inputData = array(
                "vnp_Version"    => "2.0.0",
                "vnp_TmnCode"    => $this->vnp_TmnCode, // L6SCL6L1
                "vnp_Amount"     => $totalMoney * 100, // số tiền thanh toán: x100 khử phần thập phân
                "vnp_Command"    => "pay", //mã api sử dụng cho giao dịch thanh toán là pay
                "vnp_CreateDate" => date('YmdHis'), //20190626054737
                "vnp_CurrCode"   => "VND", //Đơn vị tiền tệ sử dụng thanh toán
                "vnp_IpAddr"     => $_SERVER['REMOTE_ADDR'], //127.0.0.1: Địa chỉ ip khách hàng thực hiện giao dịch
                "vnp_Locale"     => $request->tst_language, // vn: Ngôn ngữ giao diện hiển thị
                "vnp_BankCode"   => $request->tst_bank, // mã ngân hàng: NCB
                "vnp_OrderInfo"  => $request->tst_note ? $request->tst_note : 'Gửi hàng nhanh cho tôi nhé', // Mô tả Noi dung thanh toan
                "vnp_OrderType"  => $request->tst_type, //2:online
                "vnp_ReturnUrl"  => $this->vnp_Returnurl, // http://localhost:8000/shopping/form-online: URL thông báo kết quả giao dịch khi kết thúc thanh toán
                "vnp_TxnRef"     =>$transacionID //20190626053509: mã duy nhất để phân biệt đơn hàng không được trùng nhau
            );
            ksort($inputData); // sắp xếp theo thứ tự alphab
            $query = "";
            $i = 0;
            $hashdata = "";
            //tạo url thanh toán
//            "vnp_Amount=1200&vnp_BankCode=NCB&vnp_Command=pay&vnp_CreateDate=20201101095450&vnp_CurrCode=VND&vnp_IpAddr=127.0.0.1&vnp_Locale=vn&vnp_OrderInfo=G%E1%BB%ADi+h%C3%A0ng+nhanh+cho+t%C3%B4i+nh%C3%A9%21
//            &vnp_OrderType=2&vnp_ReturnUrl=http%3A%2F%2Flocalhost%3A8000%2Fshopping%2Fform-online&vnp_TmnCode=0M8H13SJ&vnp_TxnRef=1111111111&vnp_Version=2.0.0&
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&'; //urlencode: mã hóa khoảng trắng thành dấu +
            }
            $vnp_Url = $this->vnp_Url . "?" . $query; //http://sandbox.vnpayment.vn/paymentv2/vpcpay.html + query ở trên
            if (isset($this->vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                //loại mã băm sử dụng: md5,sha256
                $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('data' => $vnp_Url);
            return redirect()->to($returnData['data']);
        }
    }

    public function getFormOnline(Request $request)
    {
        $transacionID = $request->vnp_TxnRef;
        $transacion = Transaction::find($transacionID);
        if (session('coupon')) {
            $subtotal = str_replace(',', '', \Cart::subtotal(0));
            $coupon = Coupon::select('*')->where('cp_code', session('coupon'))->first();
            $price = (($coupon->cp_discount) * $subtotal) / 100;
            $priceSale = number_format($price, 0, ',', '.');
        }
        $totalCard = !empty(session('coupon')) ? session('cartUpdateTotal') : str_replace(',', '', \Cart::subtotal(0));
        $totalCardConvert = str_replace(',', '', $totalCard);
        $totalMoney = str_replace(',', '', (int)$totalCardConvert) + (int)Product::SHIPPING_COST;
        if ($request->vnp_ResponseCode == "00" && $transacion) {
            try {
                //send mail online
                $subject = "Thư cảm ơn mua hàng";
                $name = $transacion->tst_name;
                $data = array(
                    'name'       => $name,
                    'totalMoney' => (int)$totalMoney,
                    'code'       => isset($coupon) ? $coupon->cp_code : '',
                    'discount'   => isset($coupon) ? $coupon->cp_discount : '',
                    'priceSale'  => isset($coupon) ? $priceSale : '',
                );
                $email = $transacion->tst_email;
                Mail::send('emails.email_order_online', $data, function ($message) use ($email, $subject, $name) {
                    $message->to($email, $name)
                        ->subject($subject);
                    $message->from(env('MAIL_USERNAME'), 'Beauty Store');
                });

                \Cart::destroy();
                $request->session()->forget('cartUpdateTotal');
                $request->session()->forget('coupon');

                \Session::flash('toastr', [
                    'type'    => 'success',
                    'message' => 'Giao dịch đơn hàng thành công, bạn có thể theo dõi đơn hàng trong email'
                ]);
                return redirect()->route('get.user.tracking_order', $transacionID);
            } catch (\Exception $exception) {
                Log::error("[Send mail online error]" . $exception->getMessage());
                \Session::flash('toastr', [
                    'type'    => 'error',
                    'message' => 'Có lỗi xảy ra không mong muốn, mời bạn thử lại sau'
                ]);
                return redirect()->to('/');
            }
        } else {
            //hủy giao dịch
            $transacion->tst_status = -1;
            $transacion->tst_reason = "Vì chưa thanh toán qua vnpay";
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Đơn hàng của bạn bị hủy vì chưa thanh toán!'
            ]);
            $transacion->save();
            return redirect()->route('get.user.order', $transacionID);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @author chungdd
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            //1.Lấy tham số
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);
            $price = $product->pro_price;

            //2. Kiểm tra tồn tại sản phẩm
            if (!$product) {
                return response(['messages' => 'Không tồn tại sản sản phẩm cần update']);
            }

            //3. Kiểm tra số lượng sản phẩm còn ko
            if ($product->pro_number < $qty) {
                return response([
                    'messages' => 'Số lượng cập nhật không đủ',
                    'error'    => true
                ]);
            }

            //4. Update
            \Cart::update($id, $qty);

            //kiểm tra xem sản phẩm có trong flash sale không ?

            $flash_deal = FlashSale::where('fs_status', 1)->first();
            if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->fs_start_date && strtotime(date('d-m-Y')) <= $flash_deal->fs_end_date && FlashSaleProduct::where('fsp_flash_deal_id',
                    $flash_deal->id)->where('fsp_product_id', $product->id)->first() != null) {
                $flash_deal_product = FlashSaleProduct::where('fsp_flash_deal_id',
                    $flash_deal->id)->where('fsp_product_id',
                    $product->id)->first();
                $price -= ($price * $flash_deal_product->fsp_discount) / 100;
                $sale = $flash_deal_product->fsp_discount;
            } else {
                $price -= ($price * $product->pro_sale) / 100;
                $sale = $product->pro_sale;
            }


            return response([
                'messages'   => 'Cập nhật thành công',
                'totalMoney' => \Cart::subtotal(0),
                'cartCount'  => \Cart::count(),
                'totalItem'  => number_format($price * $qty, 0, ',', '.')
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $rowId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Throwable
     * @author chungdd
     */
    public function delete(Request $request, $rowId)
    {
        if ($request->ajax()) {
            \Cart::remove($rowId);
            $html = view('frontend.pages.product.include._inc_cart_empty_item')->render();
            return response([
                'totalMoney' => \Cart::subtotal(0),
                'cartCount'  => \Cart::count(),
                'html'       => $html,
                'type'       => 'success',
                'messages'   => 'Xoá đơn hàng thành công'
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function purchase()
    {
        $shopping = \Cart::content();
        $hasCoupon = !empty(session('coupon')) ? true : false;
        $coupon = !empty(session('coupon')) ? session('coupon') : '';
        $codeCoupon = Coupon::where(['cp_code' => $coupon])->first();
        $discountType = '%';
        $viewData = [
            'title_page'   => 'Danh sách sản phẩm',
            'shopping'     => $shopping,
            'hasCoupon'    => $hasCoupon,
            'coupon'       => $coupon,
            'codeCoupon'   => $codeCoupon,
            'discountType' => $discountType
        ];
        return view('frontend.pages.purchase.index', $viewData);
    }
}
