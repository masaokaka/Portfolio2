@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>面談へのご協力ありがとうございました。</h2>
            <h3>以下より面談した学生の評価をお願いいたします。</h3>  
        </div>
        <div class="col">
            <h2>学生評価アンケート</h2> 
        </div>
        <div class="col">
            <form method="POST" action="{{ route('admin.evaluation') }}">
                {{  csrf_field() }}
                
                <p>①非言語情報</p>
                    <input type="radio" name="nonverbal" value="1">1
                    <input type="radio" name="nonverbal" value="2">2
                    <input type="radio" name="nonverbal" value="3">3
                    <input type="radio" name="nonverbal" value="4">4
                    <input type="radio" name="nonverbal" value="5">5
                
                <p>②主体性</p>
                    <input type="radio" name="initiative" value="1">1
                    <input type="radio" name="initiative" value="2">2
                    <input type="radio" name="initiative" value="3">3
                    <input type="radio" name="initiative" value="4">4
                    <input type="radio" name="initiative" value="5">5
                
                <p>③コミュニケーション能力</p>
                    <input type="radio" name="communication" value="1">1
                    <input type="radio" name="communication" value="2">2
                    <input type="radio" name="communication" value="3">3
                    <input type="radio" name="communication" value="4">4
                    <input type="radio" name="communication" value="5">5
                
                <p>④当社志望度</p>
                    <input type="radio" name="aspiration" value="1">1
                    <input type="radio" name="aspiration" value="2">2
                    <input type="radio" name="aspiration" value="3">3
                    <input type="radio" name="aspiration" value="4">4
                    <input type="radio" name="aspiration" value="5">5
                
                <p>⑤その他コメント</p>
                    <input type="text" style="width: 400px; height: 100px;" name="comment">

                <p>⑥面談に関するご意見など(任意)</p>
                    <input type="text" style="width: 400px; height: 100px;" name="feedback">

                <input type="hidden" name="interview" value="{{ $param->interview }}">
                <input type="hidden" name="date" value="{{ $param->date }}">
                <input type="hidden" name="admin_id" value="{{ $param->admin_id }}">
                <input type="hidden" name="user_id" value="{{ $param->user_id }}">
                
                <div class="col"><input type="submit" value="送信する"></div>
            </form>
        </div>      
    </div>
</div>
@endsection
