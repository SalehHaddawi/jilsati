<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @yield('stylesheets')

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style>
        .fonts{
            font-family: "Cairo","Open Sans",Nunito, sans-serif;
        }
    </style>
</head>

<body class="fonts">

<div id="app">

    <jilsati-navbar
            user="{{Auth::check() ? Auth::user()->name : ''}}"
            logo-src="{{asset('images/jilsati-logo.png')}}"
            token="{{csrf_token()}}"
            active="@yield('active')">
    </jilsati-navbar>

@yield('body')

</div>

<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')

</body>

</html>
