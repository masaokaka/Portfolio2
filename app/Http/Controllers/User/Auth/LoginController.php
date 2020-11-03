<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers {
        // logout というメソッドを、doLogoutというメソッド名に変更して継承する
        logout as doLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function logout(Request $request){
        // 1. 元々のログアウト処理を実行する
        $this->doLogout($request);
        // 2. リダイレクト先を独自に設定する。
        return redirect('login');
    }
}