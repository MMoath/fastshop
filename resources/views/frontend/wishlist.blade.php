@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">{{ __('frontend.wishlist') }}</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">{{ __('frontend.home') }}</a></li>
					<li class="active"><b>{{ __('frontend.wishlist') }}</b></li>
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
					@if(count(yourWishlist()) !=0)
					<tr>
						<th scope="col"></th>
						<th scope="col">{{ __('frontend.product_name') }}</th>
						<th scope="col">{{ __('frontend.price') }}</th>
						<th scope="col">{{ __('frontend.image') }}</th>
						<th scope="col">{{ __('frontend.oprations') }}</th>
					</tr>
					@endif
				</thead>
				<tbody>
					<?php $number = 0; ?>
					@forelse(yourWishlist() as $pro)
					<?php $number++ ?>

					<tr>
						<th>{{ $number}}</th>
						<td><a title="{{ __('frontend.show') }}" href="{{ url('products/'.$pro->product->id.'/view') }}">{{$pro->product->name}} <i class="fa fa-external-link"></i> </a></td>
						<td>$ {{$pro->product->selling_price}}</td>
						<td><img src="{{  URL::asset('imges/products/'.$pro->product->thumbnail); }}" alt="" style="max-height:10rem;"></td>
						<td>
							<a title="{{ __('frontend.add_to_cart') }}" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ url('cart/'.$pro->product->id.'/add') }}"> <i class="fa fa-shopping-cart"></i>{{ __('frontend.add_to_cart') }}</a>
							<a title="{{ __('frontend.remove_from_cart') }}" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ route('remove.from.wishlist',$pro->id) }}"> <i class="fa fa-minus-square"></i> {{ __('frontend.remove_from_cart') }}</a>

						</td>

					</tr>
					@empty
					<tr>
						<td colspan="5">
							<div class="alert alert-info alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
								{{ __('frontend.no_date') }}
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