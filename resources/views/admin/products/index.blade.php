@extends('layouts.admin.master')
@section('conternt_title')
Products <small><sub>({!! $products->total() !!})</sub></small> | <a title="add products" href="{{ route('admin.products.add') }}" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-plus-square"></i> Add Products </a>

@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ALL Products</h3>
                        <div class="card-tools">
                            <form method="GET" action="{{ route('admin.product.search') }}">
                                @csrf
                                <div class="input-group input-group-sm" style="width: 15rem;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search" required value="{{ request()->search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive-sm p-0">
                        <table class="table table-hover  table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Qty</th>
                                    <th>Unit <small>Price</small></th>
                                    <th>Selling <small>Price</small></th>
                                    <th>Profit</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>
                                        Options
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table_over">
                                @forelse ($products as $pro)
                                <tr>
                                    <td>{{ isset($pro->id) ? $pro->id : '' }}</td>
                                    <td>{{ isset($pro->name) ? $pro->name  : '' }}</td>
                                    <td>
                                        <img style="max-height:3rem; width:4rem;" class=" img-thumbnail" alt="{{$pro->thumbnail}}" src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}">
                                    </td>
                                    <td>{{ isset($pro->quantity) ? $pro->quantity : ''}}</td>
                                    <td>$ {{ isset($pro->unit_price) ? $pro->unit_price : '' }}</td>
                                    <td>$<b>{{ isset($pro->selling_price) ? $pro->selling_price : '' }}</b></td>
                                    <td>
                                        @if($pro->unit_price != null || $pro->selling_price != null )
                                        ${{ $pro->selling_price - $pro->unit_price}} | <span class="description-percentage text-success"> {{round(( $pro->selling_price - $pro->unit_price ) / $pro->unit_price * 100 ) }}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($pro->status)
                                        @case(0)
                                        <span class="badge badge-secondary">Stock</span>
                                        @break
                                        @case(1)
                                        <span class="badge badge-success">Displayed</span>
                                        @break
                                        @case(2)
                                        <span class="badge badge-primary">Discounts</span>
                                        @break
                                        @case(3)
                                        <span class="badge badge-warning">Finished</span>
                                        @break
                                        @case(4)
                                        <span class="badge badge-danger">Consists</span>
                                        @break
                                        @case(5)
                                        <span class="badge badge-Light">comment</span>
                                        @break
                                        @default
                                        There is something wrong ...
                                        @endswitch
                                    </td>
                                    <!-- ->format('d-M-Y , h:i a') -->
                                    <td>{{ isset($pro->created_at) ?  $pro->created_at->format('d-M-Y') : ''}}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined ">
                                            <a href="{{ route('admin.products.show',$pro->id) }}"   title="show"   class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.products.edit',$pro->id) }}"   title="edit"   class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.products.delete',$pro->id) }}" title="delete" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="table-danger" colspan="10">No records</td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $products->links() !!}
                        </ul>
                        <p><b>{!! $products->total() !!} </b>records</p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@stop