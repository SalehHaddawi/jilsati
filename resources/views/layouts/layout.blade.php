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
    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
@if($heavy)
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
@endif

</body>

</html>
