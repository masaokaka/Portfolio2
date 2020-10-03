<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    
{{--レイアウトファイルを指定--}}
@extends('layouts.default')

{{--@yield('title')の部分を穴埋め--}}
@section('title,$title')

{{--@yield('content')の部分を穴埋め--}}
@section('content')

    <h1>{{ $title }}</h1>
    {{-- ここはbladeのコメントです。出力時には無視されます。 --}}
    <!-- HTMLのコメントは普通に出力されます。 -->
    
    <p>$numの値は{{ $num }}です。</p>
    @if($num > 5)
    <P>5より大きいです。</P>
    @endif

    @if($num > 15)
    <P>15より大きいです。</P>
    @elseif($num > 5)
    <P>5より大きく15以下です。</P>
    @else
    <P>15以下です。</P>
    @endif

    <ul>
        @forelse($messages as $message)
        <li>{{ $message->name }}:{{ $message->body }} {{ $message->created_at }}</li>
        @empty
        <li>メッセージはありません。</li>
        @endforelse
    </ul>
@endsection
</body>
</html>