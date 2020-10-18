<?php

namespace App\Http\Controllers\User;

use App\UserRequest;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'date' => 'required',
            'time' => 'required',
            'job' => 'required',
            'obog' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'interview' => 'required',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\UserRequest
     */
    public function request(Request $request)
    {
        $date = new DateTime();
        $param = [
            'date' => $request['date'],
            'time' => $request['time'],
            'job' => $request['job'],
            'obog' => $request['obog'],
            'gender' => $request['gender'],
            'age' => $request['age'],
            'interview' => $request['interview'],
            'user_id' => $request['user_id'],
            'created_at' => $date,
            'updated_at' => $date,
        ];
        DB::table('user_requests')->insert($param);
        return redirect('/home');
    }
}
