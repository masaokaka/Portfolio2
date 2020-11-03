@extends('layouts.jinji')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <h2>面談希望者一覧</h2>
            <tr>
                <th>氏名</th><th>大学</th><th>性別</th><th>マッチ件数</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user ->name }}</td>
                    <td>{{ $user ->university }}</td>
                    <td>
                        @if($user ->gender === "man")
                            男性
                        @else
                            女性
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('jinji.match') }}">
                        {{  csrf_field() }}
                        <?php
                        $count = 0;
                        $user_req_date = optional($user->user_request)->date;
                        $user_req_time = optional($user->user_request)->time;
                        $user_req_interview = optional($user->user_request)->interview;
                        if((isset($user_req_date)) && (isset($user_req_time)) && (isset($user_req_interview))){
                            foreach($admins as $admin){
                                $admin_req_date = optional($admin->admin_request)->date;
                                $admin_req_time = optional($admin->admin_request)->time;
                                $admin_req_interview = optional($admin->admin_request)->interview;
                                if(($admin_req_date === $user_req_date) && ($admin_req_time === $user_req_time) && ($admin_req_interview === $user_req_interview)){
                                    $count++;
                                }
                            } 
                        if($count != 0){
                        ;?>
                            <input type="hidden" name="user_id" value="{{ $user ->id }}">
                            <input type="hidden" name="count" value="{{ $count }}">
                            <input type=submit value="{{ $count }}件">
                        <?php
                        }
                        } 
                        ?>
                        </form>
                            <?php 
                                foreach($matches as $match){
                                    $match_user_id[] = $match->user_id;
                                }     
                                foreach($evaluations as $evaluation){
                                    $evaluation_user_id[] = $evaluation->user_id;
                                }
                                if((in_array($user->id, $match_user_id) === true) && (in_array($user->id, $evaluation_user_id) === true)){
                            ?>
                                        <form method="POST" action="{{ route('jinji.result') }}">
                                        {{  csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type=submit value="結果">
                                        </form>        
                            <?php
                                }elseif(in_array($user->id, $match_user_id) === true){
                                    echo "面談中";
                                }
                            ?>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
