@extends('layouts.top')

@section('content')
<div class="container">
    <div class="row">
        <h3>どちらかをお選びください。</h3>
        <div><button type="button" class="btn btn-primary" onclick="location.href='{{ route('login') }}'">学生</button></div>
        <div><button type="button" class="btn btn-primary" onclick="location.href='{{ route('admin.login') }}'">社員</button></div>
    </div>
</div>
@endsection