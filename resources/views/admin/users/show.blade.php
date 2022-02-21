@extends('layouts.admin.master')
@section('conternt_title','Users | Profile')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}"> Users</a></li>
    <li class="breadcrumb-item active">Profile</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-md-2">
                @if(count($errors)>0)
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic outlined example">
                            @if($user->id != Auth::user()->id)
                            <button title="delete" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash-alt"></i></button>
                            @endif
                            <button title="edit" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-user-edit"></i></button>
                            <button title="change password" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-change_password">Change Password</button>
                        </div>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src='{{ URL::asset("imges/users/$user->picture"); }}' alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><em>{{ $user->name ? $user->name : 'No data'}}</em></h3>

                        <p class="text-muted text-center">{{ $user->email ? $user->email : 'No data'}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Gender</b>
                                <a class="float-right">{{ $user->gender ? $user->gender : 'No data' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile</b>
                                <a class="float-right">{{ $user->mobile ? $user->mobile : 'No data' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Group user</b>
                                @if($user->role == 1)
                                <a class="float-right">Administration</a>
                                @elseif($user->role == 2)
                                <a class="float-right">Costmer</a>
                                @endif


                            </li>
                            <li class="list-group-item">
                                <b>Account Status</b>
                                @if($user->account_status == 1)
                                <span class="badge bg-success float-right">Enabled</span>
                                @elseif($user->account_status == 0)
                                <span class="badge bg-danger float-right">Disabled</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Created At</b>
                                <a class="float-right">{{ $user->created_at ? $user->created_at->format('d-M-Y , h:i a') : 'No data' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Updated At</b>
                                <a class="float-right">{{ $user->updated_at ? $user->updated_at->format('d-M-Y , h:i a') : 'No data' }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
@include('admin.users.include.delete_user')
@include('admin.users.include.edit_user')
@include('admin.users.include.change_password')
@stop