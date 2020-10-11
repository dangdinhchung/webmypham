<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * @param Request $request
     * @return false|string
     * @author chungdd
     */
    public function apply_coupon_code(Request $request) {
        $idUser = \Auth::user()->id;
        if($request->ajax()) {
            $html   = '';
            $code   = $request->get('cp_code');
            $action = $request->get('action');
            //check action remove
            if ($action === 'remove') {
                $request->session()->forget('coupon');
                $html = '';
                $html .= "<tr class='showTotal'>";
                $html .= '<th>Tổng tiền hàng</th>';
                $html .= "<td style='text-align: right' id='subtotal'>" . \Cart::subtotal(0) . ' VNĐ</td>';
                $html .= '</tr>';

                return json_encode(['html' => $html]);
            }
            $check = json_decode(self::check($code, $idUser),true);
            if ($check['error'] == 1) {
                $error = 1;
                if ($check['msg'] == 'error_code_not_exist') {
                    $msg = "Mã giảm giá không hợp lệ!";
                } elseif($check['msg'] == 'error_user_used') {
                    $msg = "Bạn đã dùng mã này rồi!";
                } elseif($check['msg'] == 'error_user_not_start') {
                    $msg = "Chưa đến chương trình giảm giá!";
                } elseif($check['msg'] == 'error_user_expired') {
                    $msg = "Mã giảm giá đã hết hạn!";
                } elseif($check['msg'] == 'error_code_cant_use') {
                    $msg = 'Mã vượt quá số lần sử dụng!';
                } elseif($check['msg'] == 'error_user_not_total_price_order') {
                    $msg = 'Đơn hàng tối thiếu phải lớn hơn 100.000 VNĐ!';
                } else {
                    $msg = "Lỗi không xác định!";
                }
            } else{
                $content = $check['content'];
                $error = 0;
                $discountType = $content['cp_discount_type'] === 'percent' ? ' %' : ' VNĐ';
                $subtotal = str_replace(',','',\Cart::subtotal(0));
                $moneyDiscount = $content['cp_discount_type'] === 'percent' ? number_format(floor($subtotal * $content['cp_discount'] / 100)) : number_format($content['cp_discount']);
                $totalDiscount = $content['cp_discount_type'] === 'percent' ? floor($subtotal * $content['cp_discount'] / 100) : $content['cp_discount'];
                $cartUpdateTotal = $moneyDiscount > 0 ? number_format($subtotal - $totalDiscount) : \Cart::subtotal(0);
                $msg   = 'Mã giảm giá có giá trị giảm ' . number_format( $content['cp_discount']) . $discountType . ' cho đơn hàng này.';

                $request->session()->put('cartUpdateTotal', $cartUpdateTotal);
                $request->session()->put('coupon', $code);  //not used
                //$request->session()->forget('coupon'); //not used

                $html .= "<tr class='showTotal'>";
                $html .= '<th>Tổng tiền hàng</th>';
                $html .= "<td style='text-align: right' id='subtotal'>" . \Cart::subtotal(0) . ' VNĐ</td>';
                $html .= '</tr>';

                $html .= "<tr class='showTotal'>";
                $html .= '<th> Giảm tối đa ' . number_format($content['cp_discount']) . $discountType . ' (<b>Code:</b> ' . $code . ") </th>
                <td style='text-align: right' id='" . $discountType . "'>" . "- " . $moneyDiscount . ' VNĐ' . '</td>
                </tr>';

                $html .= "<tr class='showTotal'>";
                $html .= '<th>Tổng tiền cần thanh toán </th>';
                $html .= "<td style='text-align: right' id='subtotal'>" . $cartUpdateTotal. " VNĐ</td>";
                $html .= "</tr>";
            }
        }

        return json_encode(['error' => $error, 'msg' => $msg, 'html' => $html]);
    }

    /**
     * @param $code
     * @param $idUser
     * @return false|string
     * @author chungdd
     */
    public function check ($code, $idUser) {
        $now = strtotime( Carbon::now()->toDateString());
        $codeCoupon = Coupon::where(['cp_code' => $code])->first();
        $totalMoney = \Cart::subtotal(0);
        if($codeCoupon) {
            $idCoupon = Coupon::select('id')->where('cp_code', $code)->first()->id;
            $userOnlyCoupon = CouponUsage::where(['cpu_user_id' => $idUser,'cpu_coupon_id' => $idCoupon])->first();
        }
        $checkCountUsed = DB::table('coupons')->select('coupons.id','coupon_usages.cpu_coupon_id')
                           ->join('coupon_usages','coupons.id','=','coupon_usages.cpu_coupon_id')
                           ->count();
        if(!$codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_code_not_exist"]);
        }

        if($userOnlyCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_used"]);
        }

        if($checkCountUsed >= $codeCoupon['cp_number_uses'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_code_cant_use"]);
        }

        if($now < $codeCoupon['cp_start_date'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_not_start"]);
        }

        if($totalMoney < "100,000") {
            return json_encode(['error' => 1, 'msg' => "error_user_not_total_price_order"]);
        }

        if($now > $codeCoupon['cp_end_date'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_expired"]);
        }
        return json_encode(['error' => 0, 'content' => $codeCoupon]);
    }
}
