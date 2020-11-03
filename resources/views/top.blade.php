@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h1>Fix your meetings</h1></div>
        <div class="col"><h3>自分の予定と希望を入力して待つだけ。</h3></div>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='{{ url('/check') }}'">始める</button>
    </div>
    <div>
        <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/jinji/login') }}'">採用担当者はこちら</button>
    </div>
</div>
@endsection
