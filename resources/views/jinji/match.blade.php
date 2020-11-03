@extends('layouts.jinji')

@section('content')
<div class="container">
    <div class="row">  
            <h2>学生情報</h2>
                <p>氏名：{{ $user_data ->name }}</p>
                <p>大学：{{ $user_data ->university }}</p>
                <p>性別：
                    @if( $user_data ->gender === "man")
                        男
                    @else
                        女
                    @endif
                </p>
            <h2>面談の希望</h2>
                <p>希望日時：
                    {{ $user_data ->user_request ->date }}
                    @if($user_data ->user_request ->time === 1)
                        9:00〜10:00
                    @elseif($user_data ->user_request ->time === 2)
                        10:00〜11:00
                    @elseif($user_data ->user_request ->time === 3)
                        11:00〜12:00
                    @elseif($user_data ->user_request ->time === 4)
                        13:00〜14:00
                    @elseif($user_data ->user_request ->time === 5)
                        14:00〜15:00
                    @elseif($user_data ->user_request ->time === 6)
                        15:00〜16:00
                    @elseif($user_data ->user_request ->time === 7)
                        16:00〜17:00
                    @endif
                </p>
                <p>職種：
                    @if( $user_data ->user_request->job === "na")
                        希望なし
                    @elseif( $user_data ->user_request->job === "sales")
                        営業
                    @elseif( $user_data ->user_request->job === "accont")
                        経理
                    @elseif( $user_data ->user_request->job === "hr")
                        人事
                    @elseif( $user_data ->user_request->job === "law")
                        法務
                    @elseif( $user_data ->user_request->job === "cp")
                        経営企画
                    @endif
                </p>
                <p>性別：
                    @if( $user_data ->user_request->gender === "man")
                        男
                    @elseif( $user_data ->user_request->gender === "woman")
                        女
                    @else
                        希望なし
                    @endif    
                </p>
                <p>年次：
                    @if( $user_data ->user_request->age === "junior")
                        若手
                    @elseif( $user_data ->user_request->age === "middle")
                        中堅
                    @elseif( $user_data ->user_request->age === "senior")
                        ベテラン
                    @else
                        希望なし
                    @endif    
                </p>
                <p>OBOG：
                @if( $user_data ->user_request->obog === 1)
                    希望する
                @else
                    希望しない
                @endif
                </p>
                <p>形式：
                @if( $user_data ->user_request->interview === "online")
                    オンライン
                @elseif( $user_data ->user_request->interview === "offline")
                    オフライン
                @endif
                </p>
            <h2>マッチした社員　{{ $count }}件</h2>
            <table>
                <tr>
                    <th>社員名</th><th>職種</th><th>性別</th><th>年次</th><th>大学</th><th>形式</th><th>選択</th>
                </tr>
                <tr>
                    <?php
                        $user_req_date = $user_data->user_request->date;
                        $user_req_time = $user_data->user_request->time;
                        foreach($admins as $admin){
                            $admin_req_date = optional($admin->admin_request)->date;
                            $admin_req_time = optional($admin->admin_request)->time;
                            if(($admin_req_date === $user_req_date) && ($admin_req_time === $user_req_time)){
                    ?>
                                <td>{{ $admin->name }}</td>
                                <td>
                                    @if( $admin->job === "na")
                                        希望なし
                                    @elseif( $admin->job === "sales")
                                        営業
                                    @elseif( $admin->job === "accont")
                                        経理
                                    @elseif( $admin->job === "hr")
                                        人事
                                    @elseif( $admin->job === "law")
                                        法務
                                    @elseif( $admin->job === "cp")
                                        経営企画
                                    @endif
                                </td>
                                <td>
                                    @if($admin->gender === "man")
                                        男
                                    @else
                                        女
                                    @endif
                                </td>
                                <td>
                                    @if($admin->age === "junior")
                                        若手
                                    @elseif($admin->age === "middle")
                                        中堅
                                    @elseif($admin->age === "senior")
                                        ベテラン
                                    @endif
                                </td>
                                <td>{{ $admin->university }}</td>
                                <td>
                                @if($admin->admin_request->interview === "online")
                                    オンライン
                                @elseif($admin->admin_request->interview === "offline")
                                    オフライン
                                @else
                                    どちらでも良い
                                @endif
                                </td>
                                <td>
                                <form method="POST" action="match_complete">
                                    {{  csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                                    <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                                    <input type="hidden" name="date" value="{{ $user_data ->user_request ->date }}">
                                    <input type="hidden" name="time" value="{{ $user_data ->user_request ->time }}">
                                    <input type="hidden" name="interview" value="{{ $user_data ->user_request ->interview }}">
                                    <input type="submit" value="調整する">
                                </form>
                                </td>
                    <?php   };
                        };
                    ?>
            </table>
    </div>
</div>
@endsection
