<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Illuminate\Http\Request;

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
                } else {
                    $msg = "Lỗi không xác định!";
                }
            } else{
                $content = $check['content'];
                $error = 0;
                $discountType = $content['cp_discount_type'] == 'percent' ? ' %' : ' VNĐ';
                $msg   = "Mã giảm giá có giá trị giảm " . $content['cp_discount'] . $discountType . " cho đơn hàng này.";
            }
        }

        return json_encode(['error' => $error, 'msg' => $msg]);
    }

    public function check ($code, $idUser) {
        $codeCoupon = Coupon::where(['cp_code' => $code])->first();
        $userOnlyCoupon = CouponUsage::where(['user_id' => $idUser,'coupon_id' => $code])->first();
        if($userOnlyCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_user_used"]);
        }
        if(!$codeCoupon) {
            return json_encode(['error' => 1, 'msg' => "error_code_not_exist"]);
        }
        return json_encode(['error' => 0, 'content' => $codeCoupon]);
    }
}
