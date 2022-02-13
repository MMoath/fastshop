@extends('layouts.admin.master')
@section('conternt_title','Orders')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Orders</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Orders Table</h3>

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
                    @if(isset($orders))
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Order Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ isset($order->id) ? $order->id : 'NULL' }}</td>
                                    <td>Item<sub>s</sub> ( {{ isset($order->products) ? $order->products->count() : '0' }} )</td>
                                    <td> $ {{ isset($order->price) ? $order->price : 'NULL' }}</td>
                                    <td>
                                        @switch($order->status)
                                        @case(1)
                                        <span class="badge badge-warning"> Pending</span>
                                        @break

                                        @case(2)
                                        <span class="badge badge-info"> Processing</span>
                                        @break

                                        @case(3)
                                        <span class="badge badge-success"> Shipped</span>
                                        @break

                                        @case(4)
                                        <span class="badge badge-secondary"> Delivered</span>
                                        @break

                                        @case(5)
                                        <span class="badge badge-danger">Fail</span>
                                        @break

                                        @default
                                        <span>Something went wrong, please try again</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        {{ isset($order->created_at) ? $order->created_at : 'NULL'}}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm " role="group" aria-label="Basic outlined ">
                                            <a href="{{ route('admin.order.show',$order->id) }}" title="show" class="btn btn-outline-info"><i class="far fa-folder-open"></i> Show</a>
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
                            {!! $orders->links() !!}
                        </ul>
                    </div>
                    @else
                    <div class="card-body table-responsive p-0">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> NULL !</h5>
                            Sorry, there are no results.
                        </div>
                    </div>
                    @endif
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@stop