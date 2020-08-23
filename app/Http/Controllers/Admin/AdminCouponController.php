<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function index() {
        $coupons = Coupon::select('id','cp_code','cp_discount','cp_discount_type','cp_start_date','cp_end_date','created_at')->paginate(10);
        return view('admin.coupon.index',compact('coupons'));
    }

    public function create() {
        $categories   = Category::select('id','c_name')->get();
        return view('admin.coupon.create',compact('categories'));
    }

    public function active($id) {
        $coupon             = Coupon::find($id);
        $coupon->cp_active = !$coupon->cp_active;
        $coupon->save();

        return redirect()->back();
    }

    public function edit($id) {

    }
}
