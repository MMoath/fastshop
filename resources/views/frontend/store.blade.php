@extends('layouts.frontend.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">{{ __('frontend.home') }}</a></li>
					<li class="active">{{ __('frontend.store') }}</li>
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
			<!-- ASIDE -->
			@if(count(categories()) !=0 )
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title"> {{ __('frontend.categories') }}</h3>
					<div class="checkbox-filter">
						<form method="POST" action="{{ route('store') }}">
							@csrf
							<div class="input-checkbox">
								<input name="category" value="all" type="checkbox" id="category-all" onchange="this.form.submit();" {{  $ck == 'all' ? 'checked' : ''}}>
								<label for="category-all">
									<span></span>
									{{ __('frontend.all_categories') }}
									<small>( {{ count(categories()) }} )</small>
								</label>
							</div>
						</form>

						<?php $number = 0; ?>
						@forelse (categories() as $cat)
						<?php $number++ ?>
						<form method="POST" action="{{ route('store') }}">
							@csrf
							<div class="input-checkbox">
								<input name="category" value="{{ $cat->id }}" type="checkbox" id="category-{{ $number }}" onchange="this.form.submit();" {{ $cat->id == $ck ? 'checked' : ''}}>
								<label for="category-{{$number}}">
									<span></span>
									{{ $cat->name }}
									<small>( {{ $cat->product->count() }} )</small>
								</label>
							</div>
						</form>
						@empty
						<div class="alert alert-info alert-dismissible text-center">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
							{{ __('frontend.no_date') }}.

						</div>
						@endforelse
					</div>
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->
			@endif

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<!-- <label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label> -->

						<label>
							{{ __('frontend.show') }}:
							<form method="POST" action="{{ route('store') }}">
								@csrf

								<select name="filter_show" class="input-select" onchange="this.form.submit();">
									<option value="0" {{ ($filter == 0 )  ? 'selected' : '' }}>100</option>
									<option value="1" {{ ($filter == 1 )  ? 'selected' : '' }}>50</option>
									<option value="2" {{ ($filter == 2 )  ? 'selected' : '' }}>20</option>
								</select>
							</form>




						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<!-- <li><a href="#"><i class="fa fa-th-list"></i></a></li> -->
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">

					<!-- product -->
					@forelse ($products as $pro)
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<a href="{{ url('products/'.$pro->id.'/view') }}">
								<div class="product-img">
									<img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="{{$pro->name}} photo">
									<!-- <div class="product-label">
										<span class="sale">-30%</span>
										<span class="new">NEW</span>
									</div> -->
								</div>
								<div class="product-body">
									<p class="product-category">{{ isset($pro->category->name) != null ? $pro->category->name : ''}}</p>
									<h3 class="product-name"><a title="View" href="{{ url('products/'.$pro->id.'/view') }}">{{ $pro->name ? $pro->name : ''}}</a></h3>
									<!-- <del class="product-old-price">$990.00</del> -->
									<h4 class="product-price">$ {{ $pro->selling_price ? $pro->selling_price : ''}} </h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									@php $id="$pro->id"; @endphp
									<div class="product-btns">
										@if(checkWishlist($id) == "No")
										<button class="add-to-wishlist"><a href="{{ route('add.to.wishlist',$pro->id) }}"><i class="fa fa-heart-o"></i></a><span class="tooltipp">{{ __('frontend.add_to_wishlist') }}</span></button>
										@endif
										@if(checkWishlist($id) == "Yes")
										<button class="add-to-wishlist" disabled><i class="fa fa-heart" style="color: red;"></i><span class="tooltipp">{{ __('frontend.on_your_wishlist') }}</span></button>
										@endif

										<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">{{ __('frontend.quick_view') }}</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button title="add to cart" class="add-to-cart-btn"> <a href="{{ url('cart/'.$pro->id.'/add') }}"> <i class="fa fa-shopping-cart"></i>{{ __('frontend.add_to_cart') }}</a></button>
								</div>
							</a>
						</div>
					</div>
					@empty
					<div class="alert alert-info alert-dismissible text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>

						{{ __('frontend.no_date') }}.
					</div>
					@endforelse
					<!-- /product -->

				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">

					<nav aria-label="Page navigation">
						<ul class="pagination">
							<li class="pager">
								{{ $products->appends(request()->category)->links() }}
							</li>
						</ul>
					</nav>

					<!--<span class="store-qty">Showing 20-100 products</span>
					 <ul class="store-pagination">
						<li class="active">1</li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul> -->
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop