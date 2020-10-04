@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h1>Fix your meetings Quickly</h1></div>
        <div class="col"><h3>学生と社員が誰でも簡単に日程調整できるアプリケーションです。</h3></div>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='{{ url('/check') }}'">始める</button>
    </div>
</div>
@endsection
