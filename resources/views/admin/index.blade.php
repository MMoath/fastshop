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
            <a href="{{ route('admin.categories') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="{{ route('admin.products') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <canvas id="myChart" style="height:50vh; width:80vw;margin-bottom: 1rem;"></canvas>
        </div>

    </div>
</div>
<!-- /.row -->


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