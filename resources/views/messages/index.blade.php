@extends('layouts.default')

@section('title',$title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>現在のユーザー名:{{ Auth::user()->name }}</p>
    <form action ="{{ url('/logout') }}" method="post">
        {{ csrf_field() }}
        <button type="submit">ログアウト</button>
    </form>
    
    {{--エラーメッセージを表示--}}
    @foreach($errors->all() as $error)
    <P class="error">{{ $error }}</P>
    @endforeach


    {{--書き込み用フォーム--}}
    <form method="post" action="{{url('/messages')}}" enctype="multipart/form-data">
        {{--csrf対策--}}
        {{ csrf_field() }}
        
        {{--<div>
            <label>
                名前：
                <input type ="text" name="name" class="name_field" palceholde="名前を入力">
            </label>
        </div>--}}

        <div>
            <label>
                コメント：
                <input type ="text" name="body" class="comment_field" palceholde="コメントを入力">
            </label>
        </div>
        
        <div>
            <label>
                画像：
                <input type ="file" name="image">
            </label>
        </div>
        
        <div>
            <label>
                <input type ="submit" value="投稿する">
            </label>
        </div>
    </form>
    
    <ul>
        @forelse($messages as $message)
            <li>
                @if($message->image!=='')
                    <img src="{{ asset('storage/photos/' . $message->image) }}">
                    <br>
                @endif
                {{ $message->name }}:
                {{ $message->body }}
                {{ $message->created_at }}
            </li>
        @empty
            <li>メッセージはありません。</li>
        @endforelse
    </ul>
@endsection
