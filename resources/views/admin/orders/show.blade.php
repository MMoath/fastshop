@extends('layouts.admin.master')
@section('conternt_title','Orders | Show')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item "><a href="{{ route('admin.orders') }}"> Orders</a></li>
    <li class="breadcrumb-item active">Show</li>
</ol>
@stop
@section('content')

<div class="row">
    <div class="col-12">
        @if($order->status == 4)
        <div class="callout callout-success">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This order has been confirmed receipt by the customer.
        </div>
        @endif
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class=" nav-icon ion ion-bag"></i> ORDER <small>DETAILS.</small>
                        <small class="float-right">Date: {{ isset($order->created_at) ? $order->created_at->format('d/m/Y') : 'NULL'}}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4  invoice-col">
                    <span style="color:red;">From</span>
                    <address>
                        <strong>{{ isset($order->user) ? $order->user->name : 'NULL'}}</strong><br>
                        <b>User / Customer ID :</b> {{ isset($order->user) ? $order->user->id : '' }}<br>
                        Phone: (+967) {{ isset($order->user) ? $order->user->mobile : 'NULL'}}<br>
                        Email: {{ isset($order->user) ? $order->user->email : 'NULL'}}
                    </address>
                </div>
                <!-- /.col -->

                <div class="col-sm-4  offset-sm-4 invoice-col">
                    <b>Invoice #0000{{ $order->id + 1 -1}}</b><br>
                    <b>Status : </b>
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
                    <br>
                    <br>
                    <b>Order ID:</b> {{ isset($order->id) ? $order->id : ''}}<br>
                    <b>Order Date : </b> {{ isset($order->created_at) ? $order->created_at->format('d/m/Y  h:i a') : ''}}<br>
                    <b>Shipping Address:</b> {{ isset($order->address) ? $order->address : '' }}<br><br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Product ID</th>
                                <th>Category</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->products as $pro)
                            <tr>
                                <td>1</td>
                                <td>{{ isset($pro->name) ? $pro->name : 'NULL'}}</td>
                                <td>{{ isset($pro->id) ? $pro->id : 'NULL'}}</td>
                                <td>{{ isset($pro->category->name) ? $pro->category->name : 'NULL'}}</td>
                                <td>$ {{ isset($pro->price) ? $pro->price : 'NULL'}}</td>
                            </tr>
                            @empty
                            <tr class="table-danger text-center">
                                <td colspan="5">There are no details for ordering ! </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods :
                        @switch($order->payment_method)
                        @case(1)
                        <small><b>Direct Bank Transfer</b></small>
                        @break

                        @case(2)
                        <small><b>Direct Remittance Networks</b></small>
                        @break

                        @case(3)
                        <small><b>Cheque Payment</b></small>
                        @break

                        @case(4)
                        <small> <b>Paypal System</b></small>
                        @break

                        @default
                        <small>Something went wrong, please try again</small>
                        @endswitch
                    </p>

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <p class="lead">Order Notes : </p>
                    <b> {{ isset($order->notes) ? $order->notes : ''}}</b>
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Order Amount </p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>${{ isset($order->price) ? $order->price -1 : ''}}.00</td>
                                </tr>
                                <tr>
                                    <th>Tax </th>
                                    <td>$1</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>${{ isset($order->price) ? $order->price +1 -1 : '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <button href="#" type="button" class="btn btn-sm btn-primary" style="margin-right: 5px;" disabled>
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                    <a href="{{ route('admin.order.print',$order->id) }}" rel="noopener" target="_blank" class="btn btn-sm btn-default"><i class="fas fa-print"></i> Print</a>
                    @if($order->status == 1)
                    <a title="Change stutas " href="{{ route('admin.order.stutas', ['id' => $order->id, 'change' => '2']) }}" type="button" class="btn btn-sm btn-outline-info float-right"> CHANGE STUTAS | Processing <i class="fas fa-hourglass"></i>
                    </a>
                    @endif
                    @if($order->status == 2)
                    <a title="Change stutas " href="{{ route('admin.order.stutas', ['id' => $order->id, 'change' => '3']) }}" type="button" class="btn btn-sm btn-outline-success float-right"> CHANGE STUTAS | Shipped <i class="fas fa-truck"></i>
                    </a>
                    @endif



                </div>
            </div>
        </div>

    </div>
</div>



@stop