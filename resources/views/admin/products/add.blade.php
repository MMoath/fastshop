@extends('layouts.admin.master')
@section('conternt_title','Products | Add')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
    <li class="breadcrumb-item active">Add Products</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8  offset-md-2">
                <!-- general form elements -->
                <form id="selectform" method="POST" action="{{ route('create.product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-secondary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">{{ __('Add Products') }}</h3>
                            <div class="float-sm-right">
                                <button type="submit" class="btn btn-success btn-sm">{{ __('Add') }}</button>
                                <button type="reset" class="btn btn-outline-light  btn-sm">{{ __('Reset') }}</button>
                            </div>
                        </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">{{ __('Price') }}</label>

                                    <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" placeholder="{{ __('Price') }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">{{ __('admin.Currency') }}</label>
                                    <select class="custom-select" disabled>
                                        <option>USD</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('Category') }}</label>
                                    <select name="categories_id" class="custom-select @error('categories_id') is-invalid @enderror" required>
                                        @forelse (categories() as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @empty
                                        <option>No Category</option>
                                        @endforelse
                                    </select>
                                    @error('categories_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{ __('Image') }}</label>
                                    <input class="form-control @error('img') is-invalid @enderror" type="file" id="img" name="img" multiple>
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{ __('Description') }}</label>
                                    <textarea placeholder="{{ __('description') }}" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{ __('Notes') }}</label>
                                    <textarea placeholder="{{ __('notes') }}" id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes') }}">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>









                            </div>
                            <!-- /.card-row -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Add') }}</button>
                            <button type="button" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;" class="btn btn-outline-light  btn-sm">{{ __('Reset') }}</button>
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