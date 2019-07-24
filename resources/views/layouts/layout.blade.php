<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <style>
        @font-face {
            font-family: "Cairo";
            src: url('{{asset('fonts/Cairo/Cairo-Bold.ttf')}}');
            src: url('{{asset('fonts/Cairo/Cairo-Black.ttf')}}');
            src: url('{{asset('fonts/Cairo/Cairo-Regular.ttf')}}');
            src: url('{{asset('fonts/Cairo/Cairo-Light.ttf')}}');
            src: url('{{asset('fonts/Cairo/Cairo-ExtraLight.ttf')}}');
            src: url('{{asset('fonts/Cairo/Cairo-SemiBold.ttf')}}');
        }
    </style>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @yield('stylesheets')

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style>
        .fonts{
            font-family: 'Cairo', 'sans-serif' !important;
            font-weight: bold !important;
        }
    </style>
</head>

<body>

<div id="app" class="fonts">

    <jilsati-navbar
            :user="{{Auth::check() ? Auth::user() : 'undefined'}}"
            logo-src="{{asset('images/jilsati-logo.png')}}"
            token="{{csrf_token()}}"
            active="@yield('active')">
    </jilsati-navbar>

@yield('body')

</div>

@yield('scripts-before')

<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')

</body>

</html>
