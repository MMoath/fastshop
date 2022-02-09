@extends('layouts.admin.master')
@section('conternt_title','Settings')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Settings</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary   " style="width: 18rem;">
                    <div class="card-header ">
                        Store configuration
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a title="Categories" href="{{ route('Categories') }}">Categories</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@stop