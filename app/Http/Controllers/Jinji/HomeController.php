<?php

namespace App\Http\Controllers\Jinji;

use App\Http\Controllers\controller;
use App\Jinji;
use App\User;
use App\Admin;
use App\AdminRequest;
use App\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:jinji');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();
        return view('jinji.home', ['users' => $users, 'admins' => $admins]);
    }

    protected function guard()
    {
        return Auth::guard('jinji');
    }
}
