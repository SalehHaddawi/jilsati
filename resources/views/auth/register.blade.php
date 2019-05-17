@extends('layouts.layout')

@section('title','جلستي: تسجيل الدخول')

@section('body')

    <jilsati-navbar active="login"></jilsati-navbar>

    {{json_encode($errors->all())}}

    <div class="container">
        <div class="jumbotron justify-content-md-center shadow-sm bg-light">
            <div class="form-group">
                <form dir="rtl" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row text-center">
                        <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-10">
                            <input required placeholder="الاسم" type="text" name="name" autocomplete="name" autofocus class="form-control" id="name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="email" class="col-sm-2 col-form-label">الايميل</label>
                        <div class="col-sm-10">
                            <input required placeholder="الايميل" type="email" name="email" autocomplete="email" class="form-control" id="email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <label for="password" class="col-sm-2 col-form-label">كلمة السر</label>
                        <div class="col-sm-10">
                            <input required name="password" type="password" class="form-control" id="password" placeholder="كلمة السر">
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <jilsati-checkbox name="remember">افتكرني مرة ثانية</jilsati-checkbox>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 text-center">
                            <input type="submit" class="btn btn-success" value="سجل"/>

                            <a class="btn btn-link" href="/login">
                                عندك حساب؟
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->