<?php

namespace App\Http\Controllers\Jinji;

use App\Http\Controllers\controller;
use DateTime;
use App\Jinji;
use App\User;
use App\Admin;
use App\MatchRequest;
use App\Evaluation;
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
    public function index(Request $request)
    {   
        $sort = $request->sort;
        if(isset($sort)){
            $users = User::orderBy($sort, 'asc')->paginate(10);
        }else{
            $users = User::paginate(10);
        }
        $admins = Admin::all();
        $matches = MatchRequest::all();
        $evaluations = Evaluation::all();
        return view('jinji.home', ['users' => $users, 'admins' => $admins, 'matches' => $matches, 'evaluations' => $evaluations, 'sort' => $sort]);
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
    public function result(Request $request)
    {
        $user = DB::table('users')->where('id', $request->user_id)->first();
        $evaluation = DB::table('evaluations')->where('user_id', $request->user_id)->first();
        $admin_id = $evaluation->admin_id;
        $admin = DB::table('admins')->where('id', $admin_id)->first();
        return view('jinji.result', ['user' => $user, 'admin' => $admin, 'evaluation' => $evaluation,]);
    }



    protected function guard()
    {
        return Auth::guard('jinji');
    }
}
