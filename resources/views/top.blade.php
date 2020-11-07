@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h1>Fix your meetings</h1></div>
        <div class="col"><h3>簡単に面談が調整できるアプリケーションです</h3></div>
    </div>
    <div class="row">
        <button type="button" class="btn" style="width:150px; height:50px; font-size:20px;" onclick="location.href='{{ url('/check') }}'">始める</button>
    </div>
</div>
@endsection
