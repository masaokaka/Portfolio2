@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ route('admin.home') }}">
            {{  csrf_field() }}
            <div class="col">
                <h2>面談リクエスト</h2>   
            </div>
            <p>{{ $msg }}</p>
            <div class="col">
                <h3>日時</h3>
                <input type="date" name="date" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d", strtotime('+10 day'));?>">
                <select name="time">
                    <option value="1">09:00〜10:00</option>
                    <option value="2">10:00〜11:00</option>
                    <option value="3">11:00〜12:00</option>
                    <option value="4">13:00〜14:00</option>
                    <option value="5">14:00〜15:00</option>
                    <option value="6">15:00〜16:00</option>
                    <option value="7">16:00〜17:00</option>
                </select>
            </div>
            <div class="col">
                <h3>面談形式</h3>
                <label><input type="radio" name="interview" value="online" checked>オンライン</label>
                <label><input type="radio" name="interview" value="offline">オフライン</label>
                <label><input type="radio" name="interview" value="na">どちらでも良い</label>
            </div>
            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
            <div class="col">
                <button type="submit" class="btn btn-primary">リクエスト送信</button>
            </div>
        </form>
    </div>
</div>
@endsection
