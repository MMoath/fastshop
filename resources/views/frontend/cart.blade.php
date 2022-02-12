@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Cart</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active"><b>Cart</b></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->



<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<table class="table table-hover table-responsive-sm table-sm border-primary">
				<thead>
					<tr class="info">
						<td colspan="4">
							<i class="fa fa-dollar"></i> <b>Total of price : </b> ( {{sumPrice()}} ) USD

						</td>
						<td class="text-right" rowspan="2">
							@if(yourCart()->total() !=0)
							<a title="Order New !" type="button" class="btn btn-default primary-btn-order" href="{{ route('add-order') }}"> <i class="fa fa-check"></i> ORDER NOW !</a>
							@endif
						</td>
					</tr>
					<tr class="info">
						<td colspan="4">
							<b>Sum of products : </b> <small><span class="label label-danger">{{ yourCart()->total() }}</span> Item(s) selected</small>
						</td>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col">Product Name</th>
						<th scope="col">Price</th>
						<th scope="col">image</th>
						<th scope="col">Oprations</th>
					</tr>
				</thead>
				<tbody>
					<?php $number = 0; ?>
					@forelse(yourCart() as $pro)
					<?php $number++ ?>

					<tr>
						<th>{{ $number}}</th>
						<td><a title="view" href="{{ url('products/'.$pro->product->id.'/view') }}">{{$pro->product->name}} <i class="fa fa-external-link"></i> </a></td>
						<td>$ {{$pro->product->price}}</td>
						<td><img src="{{  URL::asset('imges/products/'.$pro->product->img); }}" alt="" style="max-height:10rem;"></td>
						<td><a title="remove from cart" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ route('remove-to-cart',$pro->id) }}"> <i class="fa fa-minus-square"></i> Remove From Cart</a></td>
					</tr>
					@empty
					<tr>
						<td colspan="5">
							<div class="alert alert-info alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h5><i class="fa fa-info"></i> NULL!</h5>
								NO data.
							</div>
						</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">
							<i class="fa fa-dollar"></i> <b>Total of price : </b> ( {{sumPrice()}} ) USD |
							<b>Sum of products : </b> <small><span class="label label-danger">{{ yourCart()->total() }}</span> Item(s) selected</small>
						</td>

					</tr>
				</tfoot>
			</table>
			<nav aria-label="Page navigation">
				<ul class="pager">
					<li>{{ yourCart()->links() }}</li>
				</ul>
			</nav>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop