@extends('layouts.admin.master')
@section('conternt_title','Products | Edit')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.products') }}">Products</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@stop
@section('content')
<form method="POST" action="{{ route('admin.products.update') }}" enctype="multipart/form-data">
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
                        <div class="form-group col-md-6">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="custom-select @error('status') is-invalid @enderror" required>
                                @forelse(productStatus() as $key => $name)
                                <option value="{{ $key }}" {{ $key == $product->status ? 'selected' : '' }}>{!! $name !!}</option>
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
                            <label for="thumbnail">{{ __('Thumbnail') }}</label>
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
                            <label for="quantity">{{ __('Quantity') }}</label>
                            <input type="number" id="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity ? $product->quantity : 'NULL' }}" required autocomplete="quantity" placeholder="{{ __('quantity') }}">
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_price">{{ __('Unit Price') }}</label>
                            <input type="number" id="unit_price" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" value="{{ $product->unit_price ? $product->unit_price : 'NULL' }}" required autocomplete="unit_price" placeholder="{{ __('Unit Price') }}">
                            @error('unit_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">{{ __('Selling Price') }}</label>
                            <input type="number" id="price" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ $product->selling_price ? $product->selling_price : 'NULL' }}" required autocomplete="selling_price" placeholder="{{ __('Selling Price') }}">
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
                        <img src="{{ URL::asset('imges/products/'.$product->thumbnail); }}" class="product-image" alt="{{$product ->name}} image">
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