<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestStoreShop;
use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function index() {
        return view('user.seller');
    }

    public function store(UserRequestStoreShop $request) {
        $user = \Auth::user();
        $user->user_type = "seller";
        $user->save();

        if(Shop::where('user_id', $user->id)->first() == null){
           Shop::create([
                'user_id'     => $user->id,
                'name'     =>  $request->name,
                'address'      => $request->address,
                'slug'  => Str::slug($request->name)
            ]);

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Tạo shop thành công!'
            ]);
            return redirect()->back();
        }
        \Session::flash('toastr', [
            'type'    => 'error',
            'message' => 'Tạo shop thất bại!'
        ]);
        return redirect()->back();
    }
}
