@extends('layouts.admin.master')
@section('conternt_title')
Categories <small><sub>({{ $Category->total() }})</sub></small> | <button title="add category" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modal-add-category">
    <i class="far fa-plus-square"></i> Add Category
</button>
@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" title="Home">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- form start -->
                @if(count($errors)>0)
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">ALL Categories 


                        </h3>

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
                    <div class="card-body table-responsive-sm p-0 ">
                        <table class="table table-hover text-center  table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Related Products</th>
                                    <th>Notes</th>
                                    <th>Created by</th>
                                    <th>Created at</th>
                                    <th>
                                        Options
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Category as $cat)
                                <tr class="table_over">
                                    <td>{{ $cat->id ? $cat->id : '' }}</td>
                                    <td>{{ $cat->name ? $cat->name : '' }}</td>
                                    <td>{{ $cat->description ? $cat->description : '' }}</td>
                                    <td>{{ $cat->product ? 'Products ( ' . $cat->product->count() . ')' : '' }}</td>
                                    <td>{{ $cat->notes ? $cat->notes : ''}}</td>
                                    <td>{{ $cat->user->name ? $cat->user->name : '' }}</td>
                                    <td>{{ isset($cat->created_at) ? $cat->created_at->format('d-M-Y , h:i a') : '' }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined ">
                                            <a href="categories/{{$cat->id}}/edit" title="edit" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                            <a href="categories/{{$cat->id}}/delete" title="delete" class="btn btn-outline-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <!-- <a title="more ..." href="details/{{$cat->id}}"><i class="far fa-folder-open"></i></a> -->
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
                            {!! $Category->links() !!}
                        </ul>
                        <p><b>{!! $Category->total() !!} recordS</b></p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
@include('admin.categories.include.add')
@stop