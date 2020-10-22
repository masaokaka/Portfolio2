<?php

namespace App\Http\Controllers\Jinji;

use App\Http\Controllers\controller;
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
        return view('jinji.home');
    }

    protected function guard()
    {
        return Auth::guard('jinji');
    }
}
