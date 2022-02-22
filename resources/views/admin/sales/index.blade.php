@extends('layouts.admin.master')
@section('conternt_title','Sales')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Sales</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
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

        </div>
    </div><!-- /.container-fluid -->
</section>

@stop