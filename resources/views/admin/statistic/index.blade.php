@extends('layouts.admin.master')
@section('conternt_title','Statistic')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Statistic</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5><i class="nav-icon fas fa-users"></i> Users</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    All users <span class="float-right badge bg-primary">{{ $all_users }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Account status : Available <span class="float-right badge bg-primary">{{ $available_users }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Account status : Unavailable
                                    <span class="float-right badge bg-primary">{{ $unavailable_users }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Male
                                    <span class="float-right badge bg-primary">{{ $male_users}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Female
                                    <span class="float-right badge bg-primary">{{ $female_users }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5>Categories</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    All categories <span class="float-right badge bg-primary">{{ $all_category }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5><i class="nav-icon fab fa-product-hunt"></i> Products</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    All products <span class="float-right badge bg-primary">{{ $all_products}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    All quantities <span class="float-right badge bg-primary">{{ $all_quantities }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5><i class=" nav-icon ion ion-bag"></i> Orders</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    All orders <span class="float-right badge bg-primary">{{ $all_order}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Processing <span class="float-right badge bg-primary">{{ $processing_orders }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Shipped
                                    <span class="float-right badge bg-primary">{{ $shipped_orders }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Delivered
                                    <span class="float-right badge bg-primary">{{ $delivered_orders }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Canceled
                                    <span class="float-right badge bg-primary">{{ $canceled_orders }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5><i class="nav-icon fas fa-cart-arrow-down"></i> Cart</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                   ALL Items In Carts <span class="float-right badge bg-primary"> {{ isset($cart) ? $cart : '' }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-center">
                        <!-- /.widget-user-image -->
                        <h5> <i class="nav-icon fas fa-heart"></i> Wishlist</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                   ALL Items In Wishlist <span class="float-right badge bg-primary"> {{ isset($wishlist) ? $wishlist : '' }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@stop