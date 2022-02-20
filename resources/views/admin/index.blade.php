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
            <a href="{{ route('admin.type.orders',1) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">

        <!-- small box -->
        <div class="small-box " style="color: #605ca8;">

            <div class="inner">
                <h3>{{ isset($Categories) ? $Categories : ''}}</h3>

                <p>All Categories</p>
            </div>
            <div class="icon">


                <i class="fas fa-folder"></i>
            </div>
            <a href="{{ route('Categories') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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



</div>
<!-- /.row -->

<div class="row chart">
    <div class="col-md-12">
        <div>
            <canvas id="myChart" style="height:45vh; width:80vw;margin-bottom: 3rem;"></canvas>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-3">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-hourglass"></i></span>
            <a href="{{ route('admin.type.orders',2) }}" type="button">
                <div class="info-box-content">
                    <span class="info-box-text">Processing Orsers</span>
                    <span class="info-box-number">{{ isset($processing_orders) ? $processing_orders : ''}}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-success">

            <span class="info-box-icon"><i class="fas fa-truck"></i></span>
            <a href="{{ route('admin.type.orders',3) }}" type="button">
                <div class="info-box-content">
                    <span class="info-box-text">Shipped Orders</span>
                    <span class="info-box-number">{{ isset($shipped_orders) ? $shipped_orders : ''}}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-secondary">
            <span class="info-box-icon"><i class="fas fa-check-double"></i></span>
            <a href="{{ route('admin.type.orders',4) }}" type="button">
                <div class="info-box-content">
                    <span class="info-box-text">Delivered Orders</span>
                    <span class="info-box-number">{{ isset($delivered_orders) ? $delivered_orders : ''}}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-ban"></i></span>
            <a href="{{ route('admin.type.orders',0) }}" type="button">
                <div class="info-box-content">
                    <span class="info-box-text">Canceled Orders</span>
                    <span class="info-box-number">{{ isset($canceled_orders) ? $canceled_orders : ''}}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success">Today</span>
                            <h5 class="description-header">$ {{ isset($sold_todye) ? $sold_todye : ''}}</h5>
                            <span class="description-text"> TOTAL REVENUE</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            <br>
                            <h5 class="description-header">$ {{ totalCost() }}</h5>
                            <span class="description-text">TOTAL COST</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-6">
                        <div class="description-block">
                            <br>
                            <!-- <span class="description-percentage text-success"> 20%</span> -->
                            <h5 class="description-header">
                                @if($sold_todye > totalCost() )
                                ${{ $sold_todye - totalCost()}} +

                                @elseif(totalCost() > $sold_todye)
                                ${{ totalCost() - $sold_todye  }} -
                                @else
                                $0
                                @endif
                            </h5>
                            <span class="description-text">TOTAL PROFIT</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <div class="card-header border-0">
                <h3 class="card-title">Top Three Selling Products</h3>
                <!-- <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                    </a>
                </div> -->
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>sold cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach(topSellingProducts() as $pro)
                        @if(++$i <= 3) <tr>
                            <td>
                                <img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="Product" class="img-thumbnail img-size-32 mr-2">
                            </td>
                            <td>
                                {{ isset($pro->name) ? $pro->name : '' }}
                            </td>
                            <td>
                                {{ isset($pro->total) ? $pro->total : ''}}
                                <small class="text-success mr-1">
                                    Sold
                                </small>
                            </td>
                            <td>
                                $

                                {{ isset($pro->selling_price) ? $pro->selling_price * $pro->total : ''}}
                            </td>
                            </tr>
                            @endif
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Items In Carts</span>
                    <span class="info-box-number">
                        {{ isset($cart) ? $cart : '' }}

                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Items In Wishlist</span>
                    <span class="info-box-number">{{ isset($wishlist) ? $wishlist : '' }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <!-- 
        <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users Active</span>
                    <span class="info-box-number">2,000</span>
                </div> -->
        <!-- /.info-box-content -->
        <!-- </div> -->
        <!-- /.info-box -->
        <!-- </div> -->
        <!-- /.col -->
    </div>
</div>


@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
        @foreach($sales as $sal)
        @switch($sal->month)
        @case(1)
        "January ", @break
        @case(2)
        "February ", @break
        @case(3)
        "March", @break
        @case(4)
        "April", @break
        @case(5)
        "May", @break
        @case(6)
        "June", @break
        @case(7)
        "July", @break
        @case(7)
        "August ", @break
        @case(7)
        "September", @break
        @case(7)
        "October", @break
        @case(7)
        "November", @break
        @case(7)
        "December", @break
        @default "No data"
        @break
        @endswitch
        @endforeach
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Sales',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [
                @foreach($sales as $sal)
                "{{$sal->sum}}",
                @endforeach
            ],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

@stop