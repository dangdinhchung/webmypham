<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFlashSaleController extends Controller
{
    public function index() {
        return view('admin.flash.index');
    }

    public function create() {
        return view('admin.flash.create');
    }

    public function product_discount(Request $request) {
        $product_ids = $request->product_ids;
        return view('admin.flash.flash_deal_discount', compact('product_ids'));
    }
}
