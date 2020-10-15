<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
    private $vnp_TmnCode = "0M8H13SJ";
    private $vnp_HashSecret = "QXKLHHCYFAALOUNFUCZLHRTYRHOQIEQV"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "http://dinhchung56.abc/gio-hang/form-online";

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        $shopping = \Cart::content();
        $viewData = [
            'title_page'   => 'Danh sách giỏ hàng',
            'shopping'     => $shopping,
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
            return redirect()->to('/');
        }

        // 2. Kiểm tra số lượng sản phẩm
        if ($product->pro_number < 1) {
            //4. Thông báo
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);

            return redirect()->back();
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
                \Session::flash('toastr', [
                    'type'    => 'error',
                    'message' => 'Số lượng sản phẩm không đủ'
                ]);
                return redirect()->back();
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
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function postPay(Request $request)
    {
        Cache::forget('HOME.PRODUCT_PAY');
        $data = $request->except("_token");
        //kiểm tra user đăng nhập chưa
        if (!\Auth::user()->id) {
            //4. Thông báo
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Đăng nhập để thực hiện tính năng này'
            ]);

            return redirect()->back();
        }

        $totalCard = !empty(session('coupon')) ? session('cartUpdateTotal') : str_replace(',', '', \Cart::subtotal(0));
        $totalMoney = str_replace(',', '', $totalCard) + (int)Product::SHIPPING_COST;
        // Lấy thông tin đơn hàng
        $products = \Cart::content();
        try {
            DB::beginTransaction();
            /*new PayManager($data, $shopping, $options);*/
            //lưu bảng transactions
            $transacionID = Transaction::insertGetId([
                'tst_user_id'     => \Auth::user()->id,
                'tst_total_money' => $totalMoney,
                'tst_name'        => $request->tst_name,
                'tst_email'       => $request->tst_email,
                'tst_phone'       => $request->tst_phone,
                'tst_address'     => $request->tst_address,
                'tst_note'        => $request->tst_note ? $request->tst_note : '',
                'tst_type'        => $request->tst_type,
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now()
            ]);
            //Lưu bảng orders
            if($transacionID) {
                foreach ($products as  $product) {
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

            //gửi mail cho khách hàng
            $subject = "Thư cảm ơn mua hàng";
            $name = $request->tst_name;
            $data = array('name'=> $name);
            $email = $request->tst_email;
            Mail::send('emails.email_order_offline', $data, function($message) use ($email, $subject, $name) {
                $message->to($email, $name)
                    ->subject($subject);
                $message->from(env('MAIL_USERNAME'),'Beauty Store');
            });

            DB::commit();

            //un session card
            \Cart::destroy();
            $request->session()->forget('cartUpdateTotal');

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Đơn hàng của bạn đã được lưu'
            ]);
            $request->session()->forget('coupon');
            return redirect()->to('/');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("[Errors pay shopping cart]" . $exception->getMessage());
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Có lỗi xảy ra không mong muốn'
            ]);
            return redirect()->to('/');
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
                $flash_deal_product = FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id',
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
                'totalItem'  => number_format($price * $qty, 0, ',', '.')
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $rowId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @author chungdd
     */
    public function delete(Request $request, $rowId)
    {
        if ($request->ajax()) {
            \Cart::remove($rowId);
            return response([
                'totalMoney' => \Cart::subtotal(0),
                'type'       => 'success',
                'message'    => 'Xoá sản phẩm khỏi đơn hàng thành công'
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function purchase() {
        $shopping = \Cart::content();
        $hasCoupon = !empty(session('coupon')) ? true : false;
        $coupon = !empty(session('coupon')) ? session('coupon') : '';
        $codeCoupon = Coupon::where(['cp_code' => $coupon])->first();
        $discountType = $codeCoupon['cp_discount_type'] === 'percent' ? ' %' : ' VNĐ';
        $viewData = [
            'title_page'   => 'Danh sách sản phẩm',
            'shopping'     => $shopping,
            'hasCoupon'    => $hasCoupon,
            'coupon'       => $coupon,
            'codeCoupon'   => $codeCoupon,
            'discountType' => $discountType
        ];
        return view('frontend.pages.purchase.index',$viewData);
    }
}
