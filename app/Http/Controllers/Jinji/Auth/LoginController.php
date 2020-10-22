<?php

namespace App\Http\Controllers\Jinji\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    //use AuthenticatesUsers;
    use AuthenticatesUsers;
   
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/jinji/home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:jinji')->except('logout');
    }

    public function showLoginForm()
    {
        return view('jinji.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('jinji');
    }

    public function logout(Request $request)
    {
        Auth::guard('jinji')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/jinji/login'); 
    }
}
