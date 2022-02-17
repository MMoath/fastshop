@extends('layouts.auth')

@section('title','Register')
@section('content')
<div class="card-body register-card-body">
    <p class="login-box-msg" style="color: red; font-weight:bolder; ">{{ __('Register') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
            <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="text-center">

            <div class="icheck-primary  @error('gender') is-invalid @enderror d-inline" style="margin-right: 10px;">
                <input type="radio" id="male" name="gender" value="Male" required>
                <label style="margin-bottom:10px;" for="male"> {{ __('Male') }}
                </label>
            </div>
            <div class="icheck-primary  @error('gender') is-invalid @enderror d-inline">
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">{{ __('Female') }}
                </label>
            </div>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input id="email" placeholder="{{ __('Email Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input id="mobile" placeholder="{{ __('Mobile') }}" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @error('mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input placeholder="{{ __('Password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div> -->
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
        </a>
    </div> -->

    <a href="{{ route('login') }}" class="text-center"><small>I already have a membership</small></a>
</div>
<!-- /.form-box -->
@endsection