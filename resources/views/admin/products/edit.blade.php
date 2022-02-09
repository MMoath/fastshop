@extends('layouts.admin.master')
@section('conternt_title','Products | Edit')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
    <li class="breadcrumb-item active">Edit Products</li>
</ol>
@stop
@section('content')
<form method="POST" action="{{ route('update.product') }}" enctype="multipart/form-data">
    @csrf
    <input name="id" value="{{ $product->id }}" type="hidden">
    <!-- Default box -->
    <div class="card card-solid card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit') }}</h3>
            <div class="float-sm-right">
                <button type="submit" class="btn btn-warning btn-sm">{{ __('Update') }}</button>
            </div>
        </div>
        <!-- /.card-header-->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('Name') }}</label>
                            <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name ? $product->name : 'NULL' }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">{{ __('Price') }}</label>

                            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price ? $product->price : 'NULL' }}" required autocomplete="price" placeholder="{{ __('Price') }}">
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
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->categories_id ? 'selected' : ''}}>{{ $cat->name }}</option>
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
                            <textarea placeholder="{{ __('description') }}" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">{{ $product->description ? $product->description : 'NULL' }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">{{ __('Notes') }}</label>
                            <textarea placeholder="{{ __('notes') }}" id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes') }}">{{ $product->notes ? $product->notes : 'NULL' }}</textarea>
                            @error('notes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img src="{{ URL::asset('imges/products/'.$product->img); }}" class="product-image" alt="{{$product ->name}} image">
                    </div>
                    <!-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="{{ URL::asset('imges/products/1643975439.png'); }}" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="{{ URL::asset('imges/products/'.$product->img); }}" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="{{ URL::asset('imges/products/1643980785.png'); }}" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="{{ URL::asset('imges/products/1643980882.png'); }}" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="{{ URL::asset('imges/products/1643973239.png'); }}" alt="Product Image"></div>
                </div> -->
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-warning btn-sm">{{ __('Update') }}</button>
        </div>
    </div>
    <!-- /.card -->
</form>


@stop