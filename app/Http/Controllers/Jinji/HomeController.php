<?php

namespace App\Http\Controllers\Jinji;

use App\Http\Controllers\controller;
use DateTime;
use App\Jinji;
use App\User;
use App\Admin;
use App\MatchRequest;
use App\AdminRequest;
use App\UserRequest;
use Illuminate\Support\Facades\DB;
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

    public function match(Request $request)
    {
        $user_data = User::find($request->user_id);
        $count = ($request->count);
        $admins = Admin::all();
        $param =['user_data'=>$user_data, 'admins'=>$admins, 'count'=>$count,];
        return view('jinji.match', $param);
    }

    public function match_complete(Request $request)
    {
        $date = new DateTime();
        $this->validate($request, MatchRequest::$rules);
        $param = [
            'user_id' => $request['user_id'],
            'admin_id' => $request['admin_id'],
            'date' => $request['date'],
            'time' => $request['time'],
            'interview' => $request['interview'],
            'created_at' => $date,
            'updated_at' => $date,
            ];
        DB::table('match_requests')->insert($param);
        DB::table('user_requests')->where('user_id', $request->user_id)->delete();
        DB::table('admin_requests')->where('admin_id', $request->admin_id)->delete();
        return view('jinji/match_complete');

    }

    protected function guard()
    {
        return Auth::guard('jinji');
    }
}
