<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserInfoController extends Controller
{
    public function updateInfo()
    {
        return view('user.update_info');
    }

    public function saveUpdateInfo(UserRequestUpdateInfo $request)
    {
        $data = $request->except('_token','avatar');
        $user = User::find(\Auth::id());

        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1)
                $data['avatar'] = $image['name'];
        }

        $user->update($data);

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cập nhật thành công'
        ]);

        return redirect()->back();
    }

    public function confirmAccount() {
        return view('user.confirm-account');
    }

    public function requestConfirmAccount() {
        $active = get_data_user('web','active');
        if($active == 1) {
            $email = get_data_user('web','email');
            $url = route('get.verify.account', ['id' => Auth::id(), 'code' => get_data_user('web','code_active')]);
            $data = [
                'link' => $url
            ];
            Mail::send('emails.verify_account', $data, function ($message) use ($email) {
                $message->to($email, 'Verify Account')->subject('Xác thực tài khoản');
                $message->from(env('MAIL_USERNAME'), 'Beauty Store');
            });
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Gui yeu cau xac thuc tai khoan thanh cong, moi ban vao kiem tra hom thu trong email'
            ]);
            return redirect()->back();
        }
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Tai khoan cua ban da duoc xac thuc'
        ]);
        return redirect()->back();
    }

    public function verifyAccount() {
        $checkUser = User::where([
            'code_active' => get_data_user('web','code_active'),
            'id'          => Auth::id()
        ])->first();
        if (!$checkUser) {
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Xin lỗi ! Đường dẫn xác nhận tài khoản không đúng!'
            ]);
            return redirect()->back();
        } else {
            $checkUser->active = 2;
            $checkUser->save();
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Xác thực tài khoản thành công'
            ]);
            return redirect()->route('get.home');
        }
    }
}
