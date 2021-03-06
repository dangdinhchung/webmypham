<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCoupon;
use App\Models\Category;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        $coupons = Coupon::select('id', 'cp_code', 'cp_discount', 'cp_start_date', 'cp_end_date',
            'cp_description', 'cp_number_uses', 'cp_active')->paginate(10);
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function create()
    {
        $categories = Category::select('id', 'c_name')->get();
        return view('admin.coupon.create', compact('categories'));
    }

    /**
     * @param AdminRequestCoupon $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function store(AdminRequestCoupon $request)
    {
        $data = $request->only('cp_discount', 'cp_code', 'cp_number_uses');
        $data['created_at'] = Carbon::now();
        if ($request->cp_description) {
            $data['cp_description'] = $request->cp_description;
        }
        $data['cp_discount_type'] = 'percent';
        $data['cp_start_date'] = $request->cp_start_date ? strtotime($request->cp_start_date) : Carbon::now()->timestamp;
        $data['cp_end_date'] = $request->cp_end_date ? strtotime($request->cp_end_date) : Carbon::now()->timestamp;
        $id = Coupon::insertGetId($data);
       if($id) {
           return redirect()->route('admin.coupon.index')->with('msg','Thêm mã giảm giá thành công');
       }
        return redirect()->route('admin.coupon.index')->with('error','Thêm mã giảm giá thất bại');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @author chungdd
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon) {
            return view('admin.coupon.update', compact('coupon'));
        }
        return redirect()->back();
    }

    /**
     * @param AdminRequestCoupon $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function update(AdminRequestCoupon $request, $id)
    {
        $coupon = Coupon::find($id);
        $data = $request->only('cp_discount', 'cp_code', 'cp_description', 'cp_discount_type', 'cp_number_uses');
        $data['cp_start_date'] = $request->cp_start_date ? strtotime($request->cp_start_date) : Carbon::now()->timestamp;
        $data['cp_end_date'] = $request->cp_end_date ? strtotime($request->cp_end_date) : Carbon::now()->timestamp;
        $data['update_at'] = Carbon::now();
        $update = $coupon->update($data);
        if ($update) {
            return redirect()->route('admin.coupon.index')->with('msg','Cập nhật mã giảm giá thành công');
        }
        return redirect()->route('admin.coupon.index')->with('error','Cập nhật mã giảm giá thất bại');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function delete($id)
    {
        $coupon = Coupon::find($id);
       /* if ($coupon) {
            $coupon->delete();
        }*/
        //return redirect()->route('admin.coupon.index')->with('msg','Xóa mã giảm giá thành công');

        return redirect()->route('admin.coupon.index')->with('error','Mã giảm giá không thể xóa!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function active($id)
    {
        $coupon = Coupon::find($id);
        $coupon->cp_active = !$coupon->cp_active;
        $coupon->save();
        return redirect()->back();
    }
}
