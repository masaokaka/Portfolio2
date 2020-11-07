@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ route('home') }}">
            {{  csrf_field()  }}
            <div class="col">
                <h2>面談リクエスト</h2>    
            </div>
            <p>{{ $msg }}</p>
            <div class="col">
                <h3>日時</h3>
                <input type="date" name="date" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d", strtotime('+20 day'));?>">
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
                <h3>職種</h3>
                <select name="job">
                    <option value="na">希望なし</option>
                    <option value="sales">営業</option>
                    <option value="accout">経理</option>
                    <option value="law">法務</option>
                    <option value="hr">人事</option>
                    <option value="cp">経営企画</option>
                </select>
            </div>
            <div class="col">
                <h3>OBOG</h3>
                <label><input type="radio" name="obog" value="1" checked>希望する</label>
                <label><input type="radio" name="obog" value="0">希望しない</label>
            </div>
            <div class="col">
                <h3>性別</h3>
                <label><input type="radio" name="gender" value="man" checked>男性</label>
                <label><input type="radio" name="gender" value="woman">女性</label>
                <label><input type="radio" name="gender" value="na">どちらでも良い</label>
            </div>
            <div class="col">
                <h3>年代</h3>
                <label><input type="radio" name="age" value="junior" checked>若手</label>
                <label><input type="radio" name="age" value="middle">中堅</label>
                <label><input type="radio" name="age" value="senior">ベテラン</label>
                <label><input type="radio" name="age" value="na">どの年代でも良い</label>
            </div>
            <div class="col">
                <h3>面談形式</h3>
                <label><input type="radio" name="interview" value="online" checked>オンライン</label>
                <label><input type="radio" name="interview" value="offline">オフライン</label>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="col">
                <button type="submit" class="btn btn-primary">リクエスト送信</button>
            </div>
        </form>
    </div>
</div>
@endsection
