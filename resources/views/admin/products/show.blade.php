@extends('layouts.admin.master')
@section('conternt_title','Products | show')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
    <li class="breadcrumb-item active">Show Products</li>
</ol>
@stop
@section('content')
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $product ->name ? $product ->name : 'NULL'}}</h3>
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
            <div class="col-12 col-sm-6">
                <h3 class="my-3" style="color:#d71453;"><em>{{ $product ->name ? $product ->name : 'NULL'}}</em></h3>
                <p><b> ID :</b> {{ $product ->id ? $product ->id : 'NULL'}}</p>
                <p><b> Price :</b> $ {{ $product->price ? $product->price : 'NULL'}}</p>
                <p><b>Category :</b> {{ isset($product->category->name) !=null ? $product->category->name : 'NULL'}}</p>
                <p><b>Created by :</b> {{ isset($product ->user->name) != null ? $product ->user->name : 'NULL'}}</p>
                <p><b>Created at :</b> {{ isset($product->created_at) !=null ? $product->created_at : 'NULL'}}</p>
                <p><b>Updated at :</b> {{ isset($product ->updated_at) != null ? $product ->updated_at : 'NULL'}}</p>
            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Notes</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ $product ->description ? $product ->description : 'NULL'}} </div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> {{ $product ->notes ? $product ->notes : 'NULL'}} </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@stop