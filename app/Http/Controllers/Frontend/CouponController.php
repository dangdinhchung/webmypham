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
    public function apply_coupon_code(Request $request) {
        $idUser = \Auth::user()->id;
        if($request->ajax()) {
            $html   = '';
            $code   = $request->get('cp_code');
            $action = $request->get('action');
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
                    $msg = "Mã vượt quá số lần sử dụng!";
                } else {
                    $msg = "Lỗi không xác định!";
                }
            } else{
                $content = $check['content'];
                $error = 0;
                $discountType = $content['cp_discount_type'] == 'percent' ? ' %' : ' VNĐ';
                if ($content['cp_discount_type'] == 'percent') {
                    //$moneyDiscount = ((100 - $content['cp_discount']) * \Cart::subtotal(0)) / 100;
                    $a = str_replace(',', '', \Cart::subtotal());
                    dd($a);
                } else {
                    $moneyDiscount = number_format($content['cp_discount']);
                }
                $msg   = "Mã giảm giá có giá trị giảm " . $content['cp_discount'] . $discountType . " cho đơn hàng này.";
                $request->session()->put('coupon', $code);

                $html .= "<tr class='showTotal'>";
                $html .= "<th>Tổng tiền hàng</th>";
                $html .= "<td style='text-align: right' id='subtotal'>" . \Cart::subtotal(0) . " VNĐ</td>";
                $html .= "</tr>";

                $html .= "<tr class='showTotal'>";
                $html .= "<th> Giảm tối đa " . number_format($content['cp_discount']) . $discountType . " (<b>Code:</b> " . $code . ") </th>
                <td style='text-align: right' id='" . $discountType . "'>" . "- " . $moneyDiscount . $discountType . "</td>
                </tr>";
            }
        }

        return json_encode(['error' => $error, 'msg' => $msg, 'html' => $html]);
    }

    public function check ($code, $idUser) {
        $now = strtotime( Carbon::now()->toDateString());
        $codeCoupon = Coupon::where(['cp_code' => $code])->first();
        $userOnlyCoupon = CouponUsage::where(['cpu_user_id' => $idUser,'cpu_coupon_id' => $code])->first();
        $checkCountUsed = DB::table('coupons')->select('coupons.id','coupon_usages.cpu_coupon_id')
                           ->join('coupon_usages','coupons.id','=','coupon_usages.cpu_coupon_id')
                           ->count();
        if($userOnlyCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_used"]);
        }

        if($checkCountUsed >= $codeCoupon['cp_number_uses'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_code_cant_use"]);
        }

        if($now < $codeCoupon['cp_start_date'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_not_start"]);
        }

        if($now > $codeCoupon['cp_end_date'] && $codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_expired"]);
        }

        if(!$codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_code_not_exist"]);
        }
        return json_encode(['error' => 0, 'content' => $codeCoupon]);
    }
}
