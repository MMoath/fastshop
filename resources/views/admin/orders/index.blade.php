@extends('layouts.admin.master')
@section('conternt_title')
Orders <small><sub>({!! $orders->total() !!})</sub></small>
@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Orders</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- dashborde of orders -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass"></i></span>
                    <a href="{{ route('admin.type.orders',2) }}" type="button">
                        <div class="info-box-content">
                            <span class="info-box-text">Processing</span>
                            <span class="info-box-number">
                                {{ isset($processing_orders) ? $processing_orders : ''}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>
                    <a href="{{ route('admin.type.orders',3) }}" type="button">
                        <div class="info-box-content">
                            <span class="info-box-text">Shipped</span>
                            <span class="info-box-number">{{ isset($shipped_orders) ? $shipped_orders : ''}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-check-double"></i></span>
                    <a href="{{ route('admin.type.orders',4) }}" type="button">
                        <div class="info-box-content">
                            <span class="info-box-text">Delivered</span>
                            <span class="info-box-number">{{ isset($delivered_orders) ? $delivered_orders : ''}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>
                    <a href="{{ route('admin.type.orders',0) }}" type="button">
                        <div class="info-box-content">
                            <span class="info-box-text">Canceled</span>
                            <span class="info-box-number">{{ isset($canceled_orders) ? $canceled_orders : ''}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>


        <!-- table of orders -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ALL Orders</h3>

                        <!-- <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 15rem;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.card-header -->
                    @if(isset($orders))
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-center table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody class="table_over">
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ isset($order->id) ? $order->id : 'NULL' }}</td>
                                    <td>Item<sub>s</sub> ( {{ isset($order->products) ? $order->products->count() : '0' }} )</td>
                                    <td> $ {{ isset($order->price) ? $order->price : 'NULL' }}</td>
                                    <td>

                                        @switch($order->payment_method)
                                        @case(1)
                                        <span>Direct Bank Transfer</span>
                                        @break

                                        @case(2)
                                        <span>Direct Remittance Networks</span>
                                        @break

                                        @case(3)
                                        <span>Cheque Payment</span>
                                        @break

                                        @case(4)
                                        <span> Paypal System</span>
                                        @break

                                        @default
                                        <span>Something went wrong, please try again</span>
                                        @endswitch
                                    </td>
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
                                        {{ isset($order->created_at) ? $order->created_at->format('d-M-Y , h:i a') : ''}}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm " role="group" aria-label="Basic outlined ">
                                            <a href="{{ route('admin.order.show',$order->id) }}" title="show" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
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
                        <p><b>{!! $orders->total() !!} </b>records</p>
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