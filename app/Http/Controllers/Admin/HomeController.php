<?php

namespace App\Http\Controllers\Admin;

use App\AdminRequest;
use App\MatchRequest;
use App\Evaluation;
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
        //調整済みの面談のうち、最新のデータを一つ取得
        $param = DB::table('match_requests')->where('admin_id', Auth::user()->id)->orderby('id', 'desc')->first();
        
        //面談予定が過去含め0であればリクエスト画面を表示
        if(empty($param)){
            $msg = ['msg'=>'',];
            return view('admin.home', $msg);
        }

        //最新の面談予定の日程が現在の日程を過ぎていないかチェック
        if($param->date < date("Y-m-d")){
            $evaluation = DB::table('evaluations')->where('admin_id', Auth::user()->id)->orderby('match_id', 'desc')->first();
            //面談が初めてでアンケートの回答データがない場合
            if(empty($evaluation)){
                return view('admin.evaluation', ['param' => $param]);
            }else{
                //面談が２回目での場合、アンケートに回答済か否かをチェック。回答していれば、面談リクエスト画面へ遷移。回答していなければ、回答画面へ。
                if(($param->id === $evaluation->match_id)){
                    $msg = ['msg'=>'',];
                    return view('admin.home', $msg);
                }else{
                    return view('admin.evaluation', ['param' => $param]);
                }
            }
        } else {
            return view('admin.reserved', ['param' => $param]);
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


    public function evaluation(Request $request)
    {
        $date = new DateTime();
        $this->validate($request, Evaluation::$rules);
        $param = [
            'nonverbal' => $request['nonverbal'],
            'initiative' => $request['initiative'],
            'communication' => $request['communication'],
            'aspiration' => $request['aspiration'],
            'comment' => $request['comment'],
            'feedback' => $request['feedback'],
            'match_id' => $request['match_id'],
            'date' => $request['date'],
            'interview' => $request['interview'],
            'admin_id' => $request['admin_id'],
            'user_id' => $request['user_id'],
        ];
        DB::table('evaluations')->insert($param);
        $msg = ['msg'=>'学生評価アンケートへのご回答ありがとうございました',];
        return view('admin/home',$msg);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
