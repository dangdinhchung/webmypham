<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\InvoiceEntered;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use App\Exports\TransactionExport;
use Illuminate\Support\Facades\Cache;

class AdminTransactionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index(Request $request)
    {
        $listRoleOfAdmin = \DB::table('role_admin')->where('role_id',4)->pluck('admin_id')->toArray();
        $idAdminLogin = get_data_user('admins');
        $transactions = Transaction::whereRaw(1);

        if (in_array($idAdminLogin, $listRoleOfAdmin)) {
            $transactions->where('tst_shipping_id', $idAdminLogin);
        }

        if ($request->id) {
            $transactions->where('id', $request->id);
        }
        if ($email = $request->email) {
            $transactions->where('tst_email', 'like', '%' . $email . '%');
        }

        if ($type = $request->type) {
            if ($type == 1) {
                $transactions->where('tst_user_id', '<>', 0);
            } else {
                $transactions->where('tst_user_id', 0);
            }
        }

        if ($status = $request->status) {
            $transactions->where('tst_status', $status);
        }

        $transactions = $transactions->orderByDesc('id')
            ->paginate(10);
        if ($request->export) {
            // Gọi thới export excel 
            return \Excel::download(new TransactionExport($transactions), date('Y-m-d') . '-don-hang.xlsx');
        }

        $viewData = [
            'transactions' => $transactions,
            'query'        => $request->query()
        ];

        return view('admin.transaction.index', $viewData);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Throwable
     * @author chungdd
     */
    public function getTransactionDetail(Request $request, $id)
    {

        if ($request->ajax()) {
            $orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')->where('od_transaction_id', $id)
                ->get();

            $html = view("components.orders", compact('orders'))->render();

            return response([
                'html' => $html
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @author chungdd
     */
    public function deleteOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $order = Order::find($id);
            if ($order) {
                $money = $order->od_qty * $order->od_price;
                //
                \DB::table('transactions')
                    ->where('id', $order->od_transaction_id)
                    ->decrement('tst_total_money', $money);
                $order->delete();
            }

            return response(['code' => 200]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            \DB::table('orders')->where('od_transaction_id', $id)
                ->delete();
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $action
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    /*public function getAction(Request $request, $action, $id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            switch ($action) {
                case 'process':
                    $transaction->tst_status = 2;
                    break;
                case 'success':
                    $transaction->tst_status = 3;
                    $this->syncDecrementProduct($id);
                    break;
                case 'cancel':
                    $transaction->tst_status = -1;
                    # code...
                    break;
            }
            $transaction->tst_admin_id = get_data_user('admins');
            $transaction->save();
        }

        if ($request->ajax()) {
            return response()->json(['code' => 200]);
        }

        return redirect()->back();
    }*/

    public function checkProcess(Request $request, $id) {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->tst_status = 2;
            $transaction->tst_admin_id = get_data_user('admins');
            $transaction->save();
        }

        if ($request->ajax()) {
            return response()->json(['code' => 200]);
        }

        return redirect()->back();
    }

    public function checkSuccess(Request $request, $id) {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->tst_status = 3;
            //$transaction->tst_admin_id = get_data_user('admins');
            $transaction->save();
            $this->syncDecrementProduct($id);
        }

        if ($request->ajax()) {
            return response()->json(['code' => 200]);
        }

        return redirect()->back();
    }

    public function checkCancel(Request $request, $id) {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->tst_status = -1;
            $transaction->tst_admin_id = get_data_user('admins');
            $transaction->save();
        }

        if ($request->ajax()) {
            return response()->json(['code' => 200]);
        }

        return redirect()->back();
    }

    /**
     * @param $transactionID
     * @author chungdd
     */
    protected function syncDecrementProduct($transactionID)
    {
        $orders = Order::where('od_transaction_id', $transactionID)
            ->get();
        if ($orders) {
            foreach ($orders as $order) {
                $product = Product::find($order->od_product_id);
                $product->pro_pay++;
                $product->save();
                Cache::forget('PRODUCT_DETAIL_' . $order->od_product_id);
                \DB::table('products')
                    ->where('id', $order->od_product_id)
                    ->decrement("pro_number", $order->od_qty);
            }
        }
    }

    /**
     * @param $transactionID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function showDeatailView($transactionID) {
        $transactions = Transaction::findOrFail($transactionID);
        $dateNow = Carbon::now();
        if($transactions->tst_admin_id > 0) {
            $admins = Admin::findOrFail($transactions->tst_admin_id);
        } else {
            $admins = [];
        }
        $orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')->where('od_transaction_id', $transactionID)
            ->get();
        // status transactions
        if($transactions->tst_status == 1) {
            $statusOrder = 'Tiếp nhận';
        } else if ($transactions->tst_status == 2) {
            $statusOrder = 'Đang vận chuyển';
        } else if($transactions->tst_status == 3) {
            $statusOrder = 'Đã bàn giao';
        } else {
            $statusOrder = 'Hủy bỏ';
        }
        //type pay online hoặc offline
        if($transactions->tst_type == 1) {
            $orderPay = 'Thanh toán sau';
        } else {
            $orderPay = 'Thanh toán online';
        }

        //get coupon
        if($transactions->tst_coupon_id) {
            $couponDetail = Coupon::findOrFail($transactions->tst_coupon_id);
        } else {
            $couponDetail = [];
        }

        //get quyên nv van chuyen
        if($transactions->tst_shipping_id) {
            $userShipping = Admin::findOrFail($transactions->tst_shipping_id);
        } else {
            $userShipping = [];
        }

        //get permission (nhân viên vận chuyển)
        $listRoleOfAdmin = \DB::table('role_admin')->where('role_id',4)->pluck('admin_id')->toArray();
        $adminRoles = Admin::whereIn('id', $listRoleOfAdmin)->where('status',1)->get();
        
        // Take the carrier for the day with the least order
        $checkShippingDay = Admin::where('admins.status',1)
        ->whereIn('admins.id', $listRoleOfAdmin)
        ->join('transactions', 'admins.id', '=', 'transactions.tst_shipping_id')
        ->select(\DB::raw('count(transactions.tst_shipping_id) as count_number'))
        ->addSelect('transactions.tst_shipping_id','admins.*')
        ->groupBy('transactions.tst_shipping_id')
        ->orderBy('count_number', 'ASC')
        ->get();

        //get info login
        $shipping = false;
       $adminId = get_data_user('admins');
        if(in_array($adminId,$listRoleOfAdmin)) {
         $shipping = true;   
        }
        return view('admin.transaction.view-detail',compact('orders','transactions','dateNow','admins','statusOrder','orderPay','couponDetail','adminRoles','userShipping','shipping','checkShippingDay'));
    }
    
    public function processShipping(Request $request) {
        $idShipping = $request->tst_shipping_id;
        $idTransaction = $request->transaction_id;
        if($idTransaction && $idShipping) {
            \DB::table('transactions')
                ->where('id', $idTransaction)
                ->update([
                    'tst_shipping_id' => $idShipping
                ]);
            return redirect()->back()->with('msg','Cập nhật trạng thái thành công');
        }
    }

    public function getInvoiceDetail($id) {
        $transactions = Transaction::findOrFail($id);
		$transaction = Transaction::with('admin:id,name')->where('id', $id)->first();
		$orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')
			->where('od_transaction_id', $id)
            ->get();
            
         //get coupon
         if($transactions->tst_coupon_id) {
            $couponDetail = Coupon::findOrFail($transactions->tst_coupon_id);
        } else {
            $couponDetail = [];
        }     

		$html =  view('user.include._inc_invoice_transaction',compact('transaction','orders','couponDetail'))->render();
		return response()->json(['html' => $html]);
    }
}
