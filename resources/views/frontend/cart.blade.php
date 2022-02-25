@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">{{ __('frontend.cart') }}</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">{{ __('frontend.home') }}</a></li>
					<li class="active"><b>{{ __('frontend.cart') }}</b></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->



<!-- SECTION -->
<div class="section section-cart">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<table class="table table-hover table-responsive-sm table-sm border-primary">
				<thead>
					<tr class="info">
						<td colspan="4">
							<i class="fa fa-dollar"></i> <b>{{ __('frontend.total_of_price') }} : </b> ( {{sumPrice()}} ) {{ __('frontend.USD') }}

						</td>
						<td class="text-right" rowspan="2">
							@if(yourCart()->total() !=0)
							<a title="{{ __('frontend.order_now') }}" type="button" class="btn btn-default primary-btn-order" href="{{ route('add-order') }}"> <i class="fa fa-check"></i> {{ __('frontend.order_now') }} </a>
							@endif
						</td>
					</tr>
					<tr class="info">
						<td colspan="4">
							<b>{{ __('frontend.sum_of_products') }} : </b> <small><span class="label label-danger">{{ yourCart()->total() }}</span> {{ __('frontend.items_selected') }} </small>
						</td>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col">{{ __('frontend.product_name') }}</th>
						<th scope="col">{{ __('frontend.price') }}</th>
						<th scope="col">{{ __('frontend.image') }}</th>
						<th scope="col">{{ __('frontend.oprations') }}</th>
					</tr>
				</thead>
				<tbody>
					<?php $number = 0; ?>
					@forelse(yourCart() as $pro)
					<?php $number++ ?>

					<tr>
						<th>{{ $number}}</th>
						<td><a title="{{ __('frontend.show') }}" href="{{ url('products/'.$pro->product->id.'/view') }}">{{$pro->product->name}} <i class="fa fa-external-link"></i> </a></td>
						<td>$ {{$pro->product->selling_price}}</td>
						<td><img style="max-height:8rem; width:10rem;" class=" img-thumbnail" src="{{  URL::asset('imges/products/'.$pro->product->thumbnail); }}" alt=""></td>
						<td><a title="{{ __('frontend.remove_from_cart') }}" type="button" class="btn btn-default btn-sm primary-btn-remove" href="{{ route('remove-to-cart',$pro->id) }}"> <i class="fa fa-minus-square"></i> {{ __('frontend.remove_from_cart') }}</a></td>
					</tr>
					@empty
					<tr>
						<td colspan="5">
							<div class="alert alert-info alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
								{{ __('frontend.no_date') }}.
							</div>
						</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">
							<i class="fa fa-dollar"></i> <b>{{ __('frontend.total_of_price') }} : </b> ( {{sumPrice()}} ) {{ __('frontend.USD') }} |
							<b>{{ __('frontend.sum_of_products') }} : </b> <small><span class="label label-danger">{{ yourCart()->total() }}</span> {{ __('frontend.items_selected') }}</small>
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