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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        $flashSales = FlashSale::paginate(10);
        return view('admin.flash.index', compact('flashSales'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function create()
    {
        return view('admin.flash.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function store(AdminRequestFlashSale $request)
    {
        $flash_sale = new FlashSale();
        $flash_sale->fs_title = $request->fs_title;
        $flash_sale->fs_start_date = strtotime($request->fs_start_date);
        $flash_sale->fs_end_date = strtotime($request->fs_end_date);
        if ($flash_sale->save()) {
            foreach ($request->products as $key => $product) {
                $flash_sale_product = new FlashSaleProduct();
                $flash_sale_product->fsp_flash_deal_id = $flash_sale->id;
                $flash_sale_product->fsp_product_id = $product;
                $flash_sale_product->fsp_discount = $request['discount_' . $product];
                $flash_sale_product->fsp_discount_type = $request['discount_type_' . $product];
                $flash_sale_product->save();
            }
            return redirect()->route('admin.flash.index')->with('msg','Thêm sự kiện thành công');
        } else {
            return redirect()->route('admin.flash.index')->with('error','Thêm sự kiện thất bại');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function product_discount(Request $request)
    {
        $product_ids = $request->product_ids;
        return view('admin.flash.flash_deal_discount', compact('product_ids'));
    }

    /**
     * @param Request $request [description]
     * @return [type]           [description]
     * @author chungdd
     * [product_discount_edit description]
     */
    public function product_discount_edit(Request $request)
    {
        $product_ids = $request->product_ids;
        $flash_sale_id = $request->flash_sale_id;
        return view('admin.flash.flash_deal_discount_edit', compact('product_ids', 'flash_sale_id'));
    }

    /**
     * @param  [type] $id [description]
     * @return [type]     [description]
     * @author chungdd
     * [edit description]
     */
    public function edit($id)
    {
        $flashSale = FlashSale::findOrFail($id);
        return view('admin.flash.edit', compact('flashSale'));
    }

    /**
     * @param Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     * @author chungdd
     * [update description]
     */
    public function update(AdminRequestFlashSale $request, $id)
    {
        $flashSale = FlashSale::findOrFail($id);
        $flashSale->fs_title = $request->fs_title;
        $flashSale->fs_start_date = strtotime($request->fs_start_date);
        $flashSale->fs_end_date = strtotime($request->fs_end_date);
        foreach ($flashSale->flash_sale_products as $key => $flash_sale_product) {
            $flash_sale_product->delete();
        }
        if ($flashSale->save()) {
            foreach ($request->products as $key => $product) {
                $flash_sale_product = new FlashSaleProduct;
                $flash_sale_product->fsp_flash_deal_id = $flashSale->id;
                $flash_sale_product->fsp_product_id = $product;
                $flash_sale_product->fsp_discount = $request['discount_' . $product];
                $flash_sale_product->fsp_discount_type = $request['discount_type_' . $product];
                $flash_sale_product->save();
            }
            return redirect()->route('admin.flash.index')->with('msg','Cập nhật sự kiện thành công');
        } else {
            return redirect()->route('admin.flash.index')->with('error','Cập nhật sự kiện thất bại');
        }
    }

    /**
     * @param  [type] $id [description]
     * @return [type]     [description]
     * @author chungdd
     * [active description]
     */
    public function active($id)
    {
        $flash = FlashSale::find($id);
        $flash->fs_status = !$flash->fs_status;
        $flash->save();

        return redirect()->back();
    }

    /**
     * @param  [type] $id [description]
     * @return [type]     [description]
     * @author chungdd
     * [delete description]
     */
    public function delete($id)
    {
        $flashSale = FlashSale::findOrFail($id);
        foreach ($flashSale->flash_sale_products as $key => $flash_sale_product) {
            $flash_sale_product->delete();
        }
        if (FlashSale::destroy($id)) {
            return redirect()->route('admin.flash.index')->with('msg','Xóa sự kiện thành công');
        } else {
            return redirect()->route('admin.flash.index')->with('error','Xóa sự kiện thất bại');
        }
    }
}
