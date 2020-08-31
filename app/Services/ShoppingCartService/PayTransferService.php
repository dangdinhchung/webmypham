<?php


namespace App\Services\ShoppingCartService;


use App\Mail\TransactionSuccess;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayTransferService extends PayBaseService implements PayServiceInterface
{
    protected $data;
    protected $idTransaction;
	protected $shopping;
    public function __construct($data, $shopping)
    {
        $this->data = $data;
        $this->shopping = $shopping;
        $this->saveTransaction();
    }

    public function saveTransaction()
    {
        $dataTransaction = $this->getDataTransaction($this->data);
        $this->idTransaction = Transaction::insertGetId($dataTransaction);
        $idCoupon = Coupon::select('id')->where('cp_code', session('coupon'))->first()->id;
        DB::table('coupon_usages')->insertGetId(
            array(
                'cpu_user_id' =>  $dataTransaction['tst_user_id'],
                'cpu_coupon_id' =>  $idCoupon
            )
        );
        $orders = $this->data['options']['orders'] ?? [];
        if ($this->idTransaction)
            $this->syncOrder($orders, $this->idTransaction);

//        \Mail::to($this->data['tst_email'])->send(new TransactionSuccess($this->shopping));
        return $this->idTransaction;
    }
}
