@extends('layouts.admin.master')
@section('conternt_title','Settings | Category edit')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('settings') }}" title="Settings">Settings</a></li>
    <li class="breadcrumb-item active">Category edit </li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">

                <img src="{{ URL::asset('imges/categories/'.$category->picture ); }}" alt="{{ $category->name }} Category thumbnail" class="img-thumbnail">
                <h6 class="text-center">
                    <hr> Thumbnail

                </h6>
            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="card card-secondary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">{{ __('admin.Category edit') }}</h3>
                            <div class="float-sm-right">
                                <button type="submit" class="btn btn-warning btn-sm">{{ __('Update') }}</button>
                            </div>
                        </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input placeholder="{{ __('admin.Name Categories') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="picture">{{ __('Thumbnail') }}</label>
                                <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture" multiple>
                                @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('admin.description') }}</label>
                                <textarea placeholder="{{ __('admin.description') }}" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $category->description }}">{{ $category->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('admin.notes') }}</label>
                                <textarea placeholder="{{ __('admin.notes') }}" id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ $category->notes  }}">{{ $category->notes  }}</textarea>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning btn-sm">{{ __('Update') }}</button>

                        </div>
                    </div>
                    <!-- /.card -->
                </form>
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@stop