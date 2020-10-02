<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestFlashSale;

class AdminFlashSaleController extends Controller
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('admin.flash.index');
    }

    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('admin.flash.create');
    }

    /**
     * @author kaopiz
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequestFlashSale $request) {
        $flash_sale = new FlashSale();
        $flash_sale->fs_title = $request->fs_title;
        $flash_sale->fs_start_date = strtotime($request->fs_start_date);
        $flash_sale->fs_end_date = strtotime($request->fs_end_date);
        if($flash_sale->save()){
            foreach ($request->products as $key => $product) {
                $flash_sale_product = new FlashSaleProduct();
                $flash_sale_product->fsp_flash_deal_id = $flash_sale->id;
                $flash_sale_product->fsp_product_id = $product;
                $flash_sale_product->fsp_discount = $request['discount_'.$product];
                $flash_sale_product->fsp_discount_type = $request['discount_type_'.$product];
                $flash_sale_product->save();
            }
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Thêm sự kiện thành công'
            ]);

            return redirect()->back();
        }
        else{
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Tạo sự kiện thất bại!'
            ]);
            return redirect()->back();
        }

    }

    /**
     * @author chungdd
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product_discount(Request $request) {
        $product_ids = $request->product_ids;
        return view('admin.flash.flash_deal_discount', compact('product_ids'));
    }
}
