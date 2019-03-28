@extends('layouts.auth')

@section('title')
<title>Register Page </title>
<meta name="description" content="User Register page" />
@endsection

@section('content')
<div id="signup-box" class="signup-box widget-box visible no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                <i class="ace-icon fa fa-users blue"></i>
                New User Registration
            </h4>

            <div class="space-6"></div>
            <p> Enter your details to begin: </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <fieldset>

                    <label class="block clearfix">
                        {{ __('Groupe Utilisateur :') }}
                        <span class="block input-icon input-icon-right">
                            <select id="groupe_user" class="form-control{{ $errors->has('groupe_user') ? ' is-invalid' : '' }}" name="groupe_user" value="{{ old('groupe_user') }}" required autofocus>
                                <?php if(isset($optionGroupeUser)) echo $optionGroupeUser; ?>
                            </select>
                            <i class="ace-icon fa fa-users"></i>
                        </span>
                        @if ($errors->has('groupe_user'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('groupe_user') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Acréditation :') }}
                        <span class="block input-icon input-icon-right">
                            <select id="acreditation" class="form-control{{ $errors->has('acreditation') ? ' is-invalid' : '' }}" name="acreditation" value="{{ old('acreditation') }}" required autofocus>
                                <?php if(isset($optionAcreditation)) echo $optionAcreditation; ?>
                            </select>
                            <i class="ace-icon fa fa-retweet"></i>
                        </span>
                        @if ($errors->has('acreditation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('acreditation') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Name :') }}
                        <span class="block input-icon input-icon-right">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Surname :') }}
                        <span class="block input-icon input-icon-right">
                            <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Sexe :') }}
                        <span class="block input-icon input-icon-right">
                            <select id="sexe" class="form-control{{ $errors->has('sexe') ? ' is-invalid' : '' }}" name="sexe" value="{{ old('sexe') }}" required autofocus>
                                </select>                                
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @if ($errors->has('sexe'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sexe') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Téléphone') }}
                        <span class="block input-icon input-icon-right">
                            <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" placeholder="+2376XXXXXXXX" required autofocus>
                            <i class="ace-icon fa fa-lock"></i>
                        </span>

                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('E-Mail Address') }}
                        <span class="block input-icon input-icon-right">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email@domaine.com" required autofocus>
                            <i class="ace-icon fa fa-retweet"></i>
                        </span>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Password') }}
                        <span class="block input-icon input-icon-right">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <i class="ace-icon fa fa-lock"></i>
                        </span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </label>

                    <label class="block clearfix">
                        {{ __('Confirm Password') }}
                        <span class="block input-icon input-icon-right">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <i class="ace-icon fa fa-refresh"></i>
                        </span>
                    </label>

                    <label class="block">
                        <input type="checkbox" class="ace" required="" />
                        <span class="lbl">
                            I accept the
                            <a href="\license" target="new">User Agreement</a>
                        </span>
                    </label>

                    <div class="space-24"></div>

                    <div class="clearfix">
                        <button type="reset" class="width-30 pull-left btn btn-sm">
                            <i class="ace-icon fa fa-refresh"></i>
                            <span class="bigger-110">Reset</span>
                        </button>

                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                            <span class="bigger-110">{{ __('Register') }}</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="toolbar center">
            <a href="{{ route('login') }}" data-target="#login-box" class="back-to-login-link">
                <i class="ace-icon fa fa-arrow-left"></i>
                Back to login
            </a>
        </div>
    </div><!-- /.widget-body -->
</div>
@endsection