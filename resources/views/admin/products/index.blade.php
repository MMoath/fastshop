@extends('layouts.admin.master')
@section('conternt_title','Products')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products Table</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 15rem;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Created at</th>
                                    <th class="text-center">
                                        <a title=" add products" href="{{ route('add.products') }}" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-plus-square"></i> Add Products </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($products as $pro)
                                <tr>
                                    <td>{{ $pro->id }}</td>
                                    <td>{{ $pro->name }}</td>
                                    <td>$<b>{{ $pro->price }}</b> USD</td>
                                    <td class="text-center">
                                        <img style="max-height:3rem; width:4rem;  " alt="{{$pro->name}}" src="{{ URL::asset('imges/products/'.$pro->img); }}">
                                    </td>
                                    <td>{{ $pro->created_at}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined ">
                                            <a href="{{ url('admin/products/'.$pro->id.'/view') }}" title="more..." class="btn btn-outline-info"><i class="far fa-folder-open"></i> View</a>
                                            <a href="{{ url('admin/products/'.$pro->id.'/edit') }}" title="edit" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('admin/products/'.$pro->id.'/delete') }}" title="delete" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Data</td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $products->links() !!}
                        </ul>
                        <p><b>{!! $products->total() !!} </b>row</p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@stop