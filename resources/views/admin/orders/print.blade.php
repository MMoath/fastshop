<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ORDER DETAILS </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/fontawesome-free/css/all.min.css'); }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/adminlte.min.css'); }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">

                        <i class=" nav-icon ion ion-bag"></i> ORDER <small>DETAILS.</small>
                        <small class="float-right">Date: {{ isset($order->created_at) ? $order->created_at->format('d/m/Y') : 'NULL'}}</small>

                    </h2> <br>
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
                                <td>$ {{ isset($pro->selling_price) ? $pro->selling_price : 'NULL'}}</td>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>