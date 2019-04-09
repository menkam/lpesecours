@extends('layouts.auth')

@section('title')
<title>Login Page </title>
<meta name="description" content="User login page" />
@endsection
@section('content')
<div id="login-box" class="login-box visible widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header blue lighter bigger">
                <i class="ace-icon fa fa-coffee green"></i>
                Please Enter Your Information
            </h4>

            <div class="space-6"></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="visiteur@gmail.com" required autofocus/>
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="12345678" placeholder="Password" required/>
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </label>

                    <div class="space"></div>

                    <div class="clearfix">
                        <label class="inline">
                            <input class="ace" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <span class="lbl"> {{ __('Remember Me') }}</span>
                        </label>

                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">{{ __('Login') }}</span>
                        </button>
                    </div>

                    <div class="space-4"></div>
                </fieldset>
            </form>

            <div class="social-or-login center">
                <span class="bigger-110">Or Login Using</span>
            </div>

            <div class="space-6"></div>

            <div class="social-login center">
                <a class="btn btn-primary">
                    <i class="ace-icon fa fa-facebook"></i>
                </a>

                <a class="btn btn-info">
                    <i class="ace-icon fa fa-twitter"></i>
                </a>

                <a class="btn btn-danger">
                    <i class="ace-icon fa fa-google-plus"></i>
                </a>
            </div>
        </div><!-- /.widget-main -->

        <div class="toolbar clearfix">
            <div>
                <a href="{{ route('password.request') }}" data-target="#forgot-box" class="forgot-password-link">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    I forgot my password
                </a>
            </div>

            <div>
                <a href="{{ route('register') }}" data-target="#signup-box" class="user-signup-link">
                    I want to register
                    <i class="ace-icon fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div><!-- /.widget-body -->
</div>
@endsection