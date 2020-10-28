@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
            <div class="col">
                <h2>面談予定</h2>  
            </div>
            <div class="col">
                <p>日程：{{ $param->date }}</p>
                <p>時間：
                    @if($param->time ===1)
                        9:00〜10:00
                    @elseif($param->time ===2)
                        10:00〜11:00
                    @elseif($param->time ===3)
                        11:00〜12:00
                    @elseif($param->time ===4)
                        11:00〜12:00
                    @elseif($param->time ===5)
                        13:00〜14:00
                    @elseif($param->time ===6)
                        14:00〜15:00
                    @elseif($param->time ===7)
                        15:00〜16:00
                    @elseif($param ->time ===8)
                        16:00〜17:00
                    @endif
                </p>
                <p>形式：
                    @if($param->interview === "online")
                        オンライン
                    @else
                        オフライン
                    @endif
                </p>
            </div>
            
            
    </div>
</div>
@endsection
