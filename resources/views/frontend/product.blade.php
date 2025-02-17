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
					<li><a href="{{ route('category',$product->category->id) }}">{{ isset( $product->category->name) !=null ?  $product->category->name : ''}}</a></li>
					<li class="active"><b>{{ $product->name}}</b></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section rtl">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->thumbnail); }}" alt="">
					</div>

					<!-- <div class="product-preview">
						<img src="{{  URL::asset('imges/products/1643973563.png'); }}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->img); }}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->img); }}" alt="">
					</div> -->
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->thumbnail); }}" alt="">
					</div>

					<!-- <div class="product-preview">
						<img src="{{  URL::asset('imges/products/1643973563.png') }}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->img); }}" alt="">
					</div>

					<div class="product-preview">
						<img src="{{  URL::asset('imges/products/'.$product->img); }}" alt="">
					</div> -->
				</div>
			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{ isset($product->name) !=null ? $product->name : ''}}</h2>
					<!-- <div>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<a class="review-link" href="#">10 Review(s) | Add your review</a>
					</div> -->
					<div>
						<!-- <del class="product-old-price">$990.00</del> -->
						<h3 class="product-price">$ {{ isset($product->selling_price) !=null ? $product->selling_price : ''}}</h3>
						<!-- <span class="product-available">In Stock</span> -->
					</div>
					<p> {{ isset($product->notes) !=null ? $product->notes : ''}}</p>

					<!-- <div class="product-options">
						<label>
							Size
							<select class="input-select">
								<option value="0">X</option>
							</select>
						</label>
						<label>
							Color
							<select class="input-select">
								<option value="0">Red</option>
							</select>
						</label>
					</div> -->

					<div class="add-to-cart">
						<div class="qty-label">

							{{ __('frontend.qty') }}

							<div class="input-number">
								<input type="number" name="qty" value="1">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>

						<button title="{{ __('frontend.add_to_cart') }}" class="add-to-cart-btn"> <a href="{{ url('cart/'.$product->id.'/add') }}"> <i class="fa fa-shopping-cart"></i>{{ __('frontend.add_to_cart') }}</a></button>

					</div>

					@php $id="$product->id"; @endphp
					<ul class="product-btns">
						@if(checkWishlist($id) == "No")
						<li><a title="{{ __('frontend.add_to_wishlist') }}" href="{{ route('add.to.wishlist',$product->id) }}"><i class="fa fa-heart-o"></i> {{ __('frontend.add_to_wishlist') }}</a></li>
						@endif
						@if(checkWishlist($id) == "Yes")
						<li><i class="fa fa-heart" style="color: red;"></i> {{ __('frontend.on_your_wishlist') }} </li>
						@endif
						<!-- <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li> -->
					</ul>

					<ul class="product-links">
						<li>{{ __('frontend.category') }} : </li>
						<li><a href="{{ route('category',$product->category->id) }}">{{ isset( $product->category->name) !=null ?  $product->category->name : 'NULL'}}</a></li>
					</ul>

					<ul class="product-links">
						<li>{{ __('frontend.share') }} :</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>

				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">{{ __('frontend.description') }} </a></li>
						<li><a data-toggle="tab" href="#tab2">{{ __('frontend.notes') }}</a></li>
						<!-- <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12 text-center">
									<p>{{ isset($product->description) !=null ? $product->description : ''}}</p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->

						<!-- tab2  -->
						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12 text-center">
									<p>{{ isset($product->notes) !=null ? $product->description : ''}}</p>
								</div>
							</div>
						</div>
						<!-- /tab2  -->

						<!-- tab3   -->
						<!-- <div id="tab3" class="tab-pane fade in">
							<div class="row"> -->
						<!-- Rating -->
						<!-- <div class="col-md-3">
							<div id="rating">
								<div class="rating-avg">
									<span>4.5</span>
									<div class="rating-stars">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
								</div>
								<ul class="rating">
									<li>
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="rating-progress">
											<div style="width: 80%;"></div>
										</div>
										<span class="sum">3</span>
									</li>
									<li>
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="rating-progress">
											<div style="width: 60%;"></div>
										</div>
										<span class="sum">2</span>
									</li>
									<li>
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="rating-progress">
											<div></div>
										</div>
										<span class="sum">0</span>
									</li>
									<li>
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="rating-progress">
											<div></div>
										</div>
										<span class="sum">0</span>
									</li>
									<li>
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="rating-progress">
											<div></div>
										</div>
										<span class="sum">0</span>
									</li>
								</ul>
							</div>
						</div> -->
						<!-- /Rating -->

						<!-- Reviews -->
						<!-- <div class="col-md-6">
							<div id="reviews">
								<ul class="reviews">
									<li>
										<div class="review-heading">
											<h5 class="name">John</h5>
											<p class="date">27 DEC 2018, 8:0 PM</p>
											<div class="review-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o empty"></i>
											</div>
										</div>
										<div class="review-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
										</div>
									</li>
									<li>
										<div class="review-heading">
											<h5 class="name">John</h5>
											<p class="date">27 DEC 2018, 8:0 PM</p>
											<div class="review-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o empty"></i>
											</div>
										</div>
										<div class="review-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
										</div>
									</li>
									<li>
										<div class="review-heading">
											<h5 class="name">John</h5>
											<p class="date">27 DEC 2018, 8:0 PM</p>
											<div class="review-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o empty"></i>
											</div>
										</div>
										<div class="review-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
										</div>
									</li>
								</ul>
								<ul class="reviews-pagination">
									<li class="active">1</li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
							</div>
						</div> -->
						<!-- /Reviews -->

						<!-- Review Form -->
						<!-- <div class="col-md-3">
							<div id="review-form">
								<form class="review-form">
									<input class="input" type="text" placeholder="Your Name">
									<input class="input" type="email" placeholder="Your Email">
									<textarea class="input" placeholder="Your Review"></textarea>
									<div class="input-rating">
										<span>Your Rating: </span>
										<div class="stars">
											<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
											<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
											<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
											<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
											<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
										</div>
									</div>
									<button class="primary-btn">Submit</button>
								</form>
							</div>
						</div> -->
						<!-- /Review Form -->
						<!-- </div>
				</div>  -->
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">{{ __('frontend.related_products') }}</h3>
				</div>
			</div>

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								@forelse ($category->product->except($product->id) as $pro)

								<div class="col-md-3 col-xs-6">
									<a href="{{ route('show.products',$pro->id) }}">
										<div class="product">
											<div class="product-img">
												<img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="{{$pro->name}} photo">
												<div class="product-label">
													<!-- <span class="sale">-30%</span> -->
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{ isset($pro->category->name) != null ? $pro->category->name : ''}}</p>
												<h3 class="product-name"><a title="{{ __('frontend.show') }}" href="{{ route('show.products',$pro->id) }}">{{ $pro->name ? $pro->name : ''}}</a></h3>
												<!-- <del class="product-old-price">$990.00</del> -->
												<h4 class="product-price">$ {{ $pro->selling_price ? $pro->selling_price : ''}}</h4>
												<div class="product-rating">
												</div>
												@php $id="$pro->id"; @endphp
												<div class="product-btns">
													@if(checkWishlist($id) == "No")
													<button class="{{ __('frontend.add_to_wishlist') }}"><a href="{{ route('add.to.wishlist',$pro->id) }}"><i class="fa fa-heart-o"></i></a><span class="tooltipp">{{ __('frontend.add_to_wishlist') }}</span></button>
													@endif
													@if(checkWishlist($id) == "Yes")
													<button class="{{ __('frontend.add_to_wishlist') }}" disabled><i class="fa fa-heart" style="color: red;"></i><span class="tooltipp">{{ __('frontend.add_to_wishlist') }}</span></button>
													@endif

													<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">{{ __('frontend.quick_view') }}</span></button>
												</div>
											</div>


											<div class="add-to-cart">
												<button title="{{ __('frontend.add_to_cart') }}" class="add-to-cart-btn"> <a href="{{ url('cart/'.$pro->id.'/add') }}"> <i class="fa fa-shopping-cart"></i> {{ __('frontend.add_to_cart') }}</a></button>
											</div>


										</div>
									</a>
								</div>

								@empty
								<div class="alert alert-info alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
									{{ __('frontend.no_date') }}
								</div>
								@endforelse

								<!-- /product -->


							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->


			<div class="clearfix visible-sm visible-xs"></div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->
@stop