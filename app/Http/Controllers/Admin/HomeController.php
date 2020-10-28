<?php

namespace App\Http\Controllers\Admin;

use App\AdminRequest;
use App\MatchRequest;
use DateTime;
use Illuminate\Support\Facades\Validator;
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
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = DB::table('match_requests')->where('admin_id', Auth::user()->id)->first();
        if(isset($param)){
            return view('admin.reserved', ['param' => $param]);
        }else{
            $msg = ['msg'=>'',];
            return view('admin.home', $msg);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\AdminRequest
     */
    public function request(Request $request)
    {
        $date = new DateTime();
        $this->validate($request, AdminRequest::$rules);
        $param = AdminRequest::where('admin_id',$request->admin_id)->first();
        //アップデート
        if(isset($param)){
            $form = $request->all();
            $param->fill($form)->save();
            $msg = ['msg'=>'リクエストの更新に成功しました。',];
        //新規リクエスト
        }else{
            $param = [
                'date' => $request['date'],
                'time' => $request['time'],
                'interview' => $request['interview'],
                'admin_id' => $request['admin_id'],
                'created_at' => $date,
                 'updated_at' => $date,
            ];
            DB::table('admin_requests')->insert($param);
            $msg = ['msg'=>'リクエストの送信に成功しました。',];
        }
        return view('admin/home',$msg);
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }
}
