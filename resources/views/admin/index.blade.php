@extends('layouts.admin.master')
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ isset($new_orders) ? $new_orders : ''}}</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.new.orders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ isset($all_product) ? $all_product : ''}}</h3>

                <p>All Product</p>
            </div>
            <div class="icon">
                <i class="fab fa-product-hunt"></i>
            </div>
            <a href="{{ route('products') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ isset($users) ? $users : ''}}</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">

        <!-- small box -->
        <div class="small-box " style="color: #605ca8;">

            <div class="inner">
                <h3>{{ isset($carts) ? $carts : ''}}</h3>

                <p>Items In Carts</p>
            </div>
            <div class="icon">

                <i class="fas fa-cart-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->


</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-3">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-hourglass"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Processing Orsers</span>
                <span class="info-box-number">{{ isset($processing_orders) ? $processing_orders : ''}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fas fa-truck"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Shipped Orders</span>
                <span class="info-box-number">{{ isset($shipped_orders) ? $shipped_orders : ''}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-secondary">
            <span class="info-box-icon"><i class="fas fa-check-double"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Delivered Orders</span>
                <span class="info-box-number">{{ isset($delivered_orders) ? $delivered_orders : ''}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-ban"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Canceled Orders</span>
                <span class="info-box-number">{{ isset($canceled_orders) ? $canceled_orders : ''}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>

@stop