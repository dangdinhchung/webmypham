<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function getFormLogin()
    {
        $title_page = 'Đăng nhập';
        return view('auth.login',compact('title_page'));
    }

    /**
     * @param RequestLogin $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function postLogin(RequestLogin $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $this->logLogin();
			\Session::flash('toastr', [
				'type'    => 'success',
				'message' => 'Đăng nhập thành công'
			]);
            return redirect()->intended('/');
        }

        \Session::flash('toastr', [
            'type'    => 'error',
            'message' => 'Sai tên email hoặc password'
        ]);

        return redirect()->back();
    }

    /**
     * Write history log lgin
     * @author chungdd
     */
    protected function logLogin()
    {
        $log = get_agent();
        $historyLog = \Auth::user()->log_login;
        $historyLog = json_decode($historyLog,true) ?? [];
        $historyLog[] = $log;
        \DB::table('users')->where('id', \Auth::user()->id)
            ->update([
                'log_login' => json_encode($historyLog)
            ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    /**
     * @param $social
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @author chungdd
     */
    public function redirectProvider() {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @param $social
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function handleProviderCallback() {
        $userSOcial = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($userSOcial);
       if($authUser === false) {
           \Session::flash('toastr', [
               'type'    => 'error',
               'message' => 'Thông tin bạn đã đăng ký nên xin mời đăng nhập bằng tài khoản khác'
           ]);
           return redirect()->route('get.login');
       }
        $existingUser = User::where('social_id', $authUser->social_id)->first();
        Auth::login($existingUser);
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Đăng nhập thành công'
        ]);
        return redirect()->route('get.home');
    }

    /**
     * @param $userFb
     * @return User
     * @author chungdd
     */
    private function findOrCreateUser($userSOcial){
        $authUser = User::where('social_id',$userSOcial->id)->first();
        $emailCheck = User::where('email',$userSOcial->email)->first();
        if($emailCheck) {
            return false;
        } else {
            if($authUser){
                return $authUser;
            }else{
                $user = new User();
                $user->name = $userSOcial->name;
                $user->email = $userSOcial->email;
                $user->social_id = $userSOcial->id;
                $user->active = 2;
                $user->password = '';
                $user->avatar = $userSOcial->avatar;
                $user->save();
                return $user;
            }
        }
    }
}
