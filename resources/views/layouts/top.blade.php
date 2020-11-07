<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: white;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- アプリ名 -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="nav navbar-nav navbar-right" style="margin-top: 6px;">
                    <button type="button" class="btn btn-success" onclick="location.href='{{ url('/jinji/login') }}'">採用担当者はこちら</button>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
