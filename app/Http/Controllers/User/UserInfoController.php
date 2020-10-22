<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestUpdatePassword;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserInfoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function updateInfo()
    {
        return view('user.update_info');
    }

    /**
     * @param UserRequestUpdateInfo $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function confirmAccount() {
        return view('user.confirm-account');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
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
                'message' => 'Gửi yêu cầu xác thực tài khoản thành công, mời bạn vào kiểm tra trong hòm thư email'
            ]);
            return redirect()->back();
        }
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Tài khoản của bạn đã được xác thực'
        ]);
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function updatePassword() {
        return view('user.update_password');
    }

    public function saveUpdatePassword(UserRequestUpdatePassword $request) {
        if(Hash::check($request->password_old,get_data_user('web','password'))){
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($request->password);
            $user->save();
            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Cập nhật mật khẩu thành công'
            ]);
            return redirect()->back();
        }else{
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Cập nhật mật khẩu thất bại'
            ]);
            return redirect()->back();
        }
    }
}
