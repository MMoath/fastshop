@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Wishlist</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active"><b>Wishlist</b></li>
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
					@forelse(yourWishlist() as $pro)
					<?php $number++ ?>

					<tr>
						<th>{{ $number}}</th>
						<td><a title="view" href="{{ url('products/'.$pro->product->id.'/view') }}">{{$pro->product->name}} <i class="fa fa-external-link"></i> </a></td>
						<td>$ {{$pro->product->selling_price}}</td>
						<td><img src="{{  URL::asset('imges/products/'.$pro->product->thumbnail); }}" alt="" style="max-height:10rem;"></td>
						<td>
							<a title="add to cart" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ url('cart/'.$pro->product->id.'/add') }}"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
							<a title="remove from wishlist" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ route('remove.from.wishlist',$pro->id) }}"> <i class="fa fa-minus-square"></i> Remove Wish</a>

						</td>

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
			</table>
			<nav aria-label="Page navigation">
				<ul class="pager">
					<li>{{ yourWishlist()->links() }}</li>
				</ul>
			</nav>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop