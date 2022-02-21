@extends('layouts.admin.master')
@section('conternt_title','Products | Add')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.products') }}">Products</a></li>
    <li class="breadcrumb-item active">Add</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8  offset-md-2">
                <!-- general form elements -->
                <form id="resetForm" method="POST" action="{{ route('admin.products.create') }}" enctype="multipart/form-data">
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
                                <div class="form-group col-md-8">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>{{ __('Status') }}</label>
                                    <select name="status" class="custom-select @error('status') is-invalid @enderror" required>
                                        @forelse(productStatus() as $key => $name)
                                        <option value="{{ $key }}">{!! $name !!}</option>
                                        @empty
                                        <option>No Status</option>
                                        @endforelse
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{ __('Thumbnail') }}</label>
                                    <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail" multiple>
                                    @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                                <div class="form-group col-md-3">
                                    <label for="quantity">{{ __('Quantity') }}</label>
                                    <input placeholder="{{ __('quantity') }}" id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="price">{{ __('Unit Price') }}</label>

                                    <input type="number" id="unit_price" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" value="{{ old('unit_price') }}" required autocomplete="unit_price" placeholder="{{ __('Unit Price') }}">
                                    @error('unit_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">{{ __('Selling Price') }}</label>

                                    <input type="number" id="price" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ old('selling_price') }}" required autocomplete="price" placeholder="{{ __('Selling Price') }}">
                                    @error('selling_price')
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
                            <button type="button" onclick="buttonReset()" class="btn btn-outline-light  btn-sm">{{ __('Reset') }}</button>
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