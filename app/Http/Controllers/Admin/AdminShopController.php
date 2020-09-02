<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class AdminShopController extends Controller
{
    public function index() {
        if (!check_admin()) return redirect()->route('get.admin.index');
        $shops = Shop::paginate(20);
        return view('admin.shop.index',compact('shops'));
    }

    public function active() {

    }
}
