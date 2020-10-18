<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\User\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home'; //リダイレクト先

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request){
        // 1. 元々のログアウト処理を実行する
        $this->doLogout($request);
        // 2. リダイレクト先を独自に設定する。
        return redirect('login');
    }
}