@extends('layouts.layout')

@section('title','جلستي: تسجيل الدخول')

@section('active','login')

@section('body')

    {{json_encode($errors->all())}}

    <div class="container">
        <div class="jumbotron justify-content-md-center shadow-sm bg-light">
            <div class="form-group">
                <form dir="rtl" method="post" action="/login">
                    @csrf
                    <div class="form-group row text-center">
                        <label for="email" class="col-sm-2 col-form-label">الايميل</label>
                        <div class="col-sm-10">
                            <input required placeholder="الايميل" type="email" name="email" autocomplete="email" autofocus class="form-control" id="email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="password" class="col-sm-2 col-form-label">كلمة السر</label>
                        <div class="col-sm-10">
                            <input name="password" required type="password" class="form-control" id="password" placeholder="كلمة السر">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <jilsati-checkbox name="remember">افتكرني مرة ثانية</jilsati-checkbox>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 text-center">
                            <button type="submit" class="btn btn-success">
                                دخول
                            </button>

                            <a class="btn btn-link" href="/register">
                                ما عندك حساب؟
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

-->
