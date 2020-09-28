<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Http\Request;

class AdminShopController extends Controller
{
    public function index() {
        if (!check_admin()) return redirect()->route('get.admin.index');
        $sellers = Seller::with('user:id,name,email')->paginate(20);
        return view('admin.shop.index',compact('sellers'));
    }

    public function active() {

    }
}
