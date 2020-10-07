<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'date' => 'required|date',
            'time' => 'required|string',
            'interview' => 'required|string',
            'admin_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'date' => $data['date'],
            'time' => $data['time'],
            'interview' => $data['interview'],
            'admin_id' => $data['admin_id'],
        ]);
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }
}
