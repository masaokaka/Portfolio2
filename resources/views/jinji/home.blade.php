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
                        <?php
                        $count = 0;
                        $user_req_date = optional($user->user_request)->date;
                        $user_req_time = optional($user->user_request)->time;
                        if((isset($user_req_date)) && (isset($user_req_time))){
                            foreach($admins as $admin){
                                $admin_req_date = optional($admin->admin_request)->date;
                                $admin_req_time = optional($admin->admin_request)->time;
                                if(($admin_req_date === $user_req_date) && ($admin_req_time === $user_req_time)){
                                    $count++;
                                }
                            } 
                        ;?>
                        <a href="#">{{ $count }}件</a>
                        <?php }else{ ;?>
                        0件
                        <?php } ;?>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
