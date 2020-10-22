<?php

namespace App\Http\Controllers\User;

use App\UserRequest;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg = ['msg'=>'',];
        return view('user.home', $msg);
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
        $this->validate($request, UserRequest::$rules);
        //アップデート
        if(UserRequest::where('user_id',$request->user_id)){
            $param = UserRequest::where('user_id',$request->user_id)->first();
            $form = $request->all();
            $param->fill($form)->save();
            $msg = ['msg'=>'リクエストの更新に成功しました。',];
        }else{
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
        $msg = ['msg'=>'リクエストの送信に成功しました。',];
        }
        return view('User/home', $msg);
    }
}
