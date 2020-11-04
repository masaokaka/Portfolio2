@extends('layouts.jinji')

@section('content')
<div class="container">
    <div class="row">
        <h2>{{ $user->name }}さんの面談結果</h2>
        <p>○面談日</p>
        <p>{{ $evaluation->date }}(
            @if( $evaluation->interview === "online" )
                オンライン
            @else
                オフライン
            @endif
        )</p>
        <p>○面談者</p>
        <p>{{ $admin->name }} (
            @if( $admin->gender === "man")
                男
            @elseif( $admin->gender === "woman")
                女
            @endif   
            )：
            @if( $admin->job === "sales")
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
        </p>
        <p>○評価</p>
        <p>非言語：{{ $evaluation->nonverbal }}</p>
        <p>主体性：{{ $evaluation->initiative }}</p>
        <p>コミュニケーション力：{{ $evaluation->communication }}</p>
        <p>当社志望度：{{ $evaluation->aspiration }}</p>
        <p>コメント：{{ $evaluation->comment }}</p>
    </div>
    <div class="row">
        <a href="home">戻る</a>
    </div>
</div>
@endsection
