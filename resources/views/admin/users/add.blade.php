@extends('layouts.admin.master')
@section('conternt_title','Users | Add')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users') }}"> Users</a></li>
    <li class="breadcrumb-item active">Add Users</li>
</ol>
@stop
@section('content')

<div class="row">
    <!-- left column -->

    <div class="col-md-8 offset-md-2">
        <!-- general form elements -->
        <form method="POST" action="{{ route('creat.user') }}" id="selectform">
            @csrf
            <div class="card card-secondary">
                <!-- <div class="card-header">
                        <h3 class="card-title">{{ __('Add Users') }}</h3>
                        <div class="float-sm-right">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Create') }}</button>
                            <button type="reset" class="btn btn-outline-light  btn-sm">{{ __('Reset') }}</button>
                        </div>
                    </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-9 col-md-9 ">
                            <label for="name">{{ __('Name') }}</label>
                            <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group   col-lg-2 col-md-2  " style="margin-top:15px;">

                            <div class="icheck-primary  @error('gender') is-invalid @enderror d-inline">
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
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('Email Address') }}</label>

                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">{{ __('Mobile') }}</label>
                            <input type="number" id="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="{{ __('Mobile') }}">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="{{ __('Password') }}" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('Usre Roles') }}</label>
                            <select name="role" class="custom-select @error('role') is-invalid @enderror" required>
                                <option value="1">{{ __('Administration') }}</option>
                                <option value="2" selected>{{ __('Costmer') }}</option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 offset-md-3">
                            <div class="icheck-success d-inline" style="margin-right:1rem;">
                                <input type="radio" name="account_status" id="enabled" value="1" required>
                                <label for="enabled">
                                    {{ __('Account Enabled') }}
                                </label>
                            </div>
                            <div class="icheck-danger  d-inline">
                                <input type="radio" name="account_status" id="disabled" value="0" required>
                                <label for="disabled">
                                    {{ __('Account Disabled') }}
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">{{ __('Create') }}</button>
                   
                    <button type="button" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;" class="btn btn-outline-light  btn-sm">{{ __('Reset') }}</button>
                  
                </div>

            </div>
            <!-- /.card -->
        </form>
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->


@stop