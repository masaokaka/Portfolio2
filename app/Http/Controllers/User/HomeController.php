<?php

namespace App\Http\Controllers\User;

use App\UserRequest;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $param = DB::table('match_requests')->where('user_id', Auth::user()->id)->first();
        if(isset($param)){
            return view('user.reserved', ['param' => $param]);
        }else{
            $msg = ['msg'=>'',];
            return view('user.home', $msg);
        }
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
        $param = UserRequest::where('user_id',$request->user_id)->first();
        //アップデート
        if(isset($param)){
            $form = $request->all();
            $param->fill($form)->save();
            $msg = ['msg'=>'リクエストの更新に成功しました。',];
        //新規リクエスト
        } else {
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
        return view('user/home', $msg);
    }
}
