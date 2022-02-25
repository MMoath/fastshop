@extends('layouts.frontend.master')
@section('alert')
@auth
@if(checkShipped() == 'yes')
@include('layouts.massage.shipped_order')
@endif
@endauth
@stop
@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php $namber = 0; ?>
            @forelse (categories() as $cat)
            <?php $namber++; ?>

            @if($namber <= 3) <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img" style="max-height: 240px;">
                            <img src="{{ URL::asset('imges/categories/'.$cat->picture); }}" alt=" {{ $cat->name ? $cat->name : ''}} Collection " style="max-height: 25rem;">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $cat->name ? $cat->name : ''}}<br>{{ __('frontend.collection') }}</h3>
                            <a href="{{ route('category',$cat->id) }}" class="cta-btn">{{ __('frontend.shop_now') }} <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
                @endif
                @empty

                @endforelse

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{ __('frontend.new_products') }}</h3>
                    <!-- <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @forelse ($products as $pro)
                                <div class="product">
                                    <a href="{{ route('show.products',$pro->id) }}">
                                        <div class="product-img">
                                            <img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="{{$pro->name}} photo">
                                            <div class="product-label">
                                                <!-- <span class="sale">-30%</span> -->
                                                <span class="new">{{ __('frontend.new') }}</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ isset($pro->category->name) != null ? $pro->category->name : ''}}</p>
                                            <h3 class="product-name"><a title="{{ __('frontend.show') }}" href="{{ route('show.products',$pro->id) }}">{{ $pro->name ? $pro->name : ''}}</a></h3>
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
                                                <button class="quick-view" data-toggle="modal" data-target="#produt{{$id}}"><i class="fa fa-eye"></i><span class="tooltipp">{{ __('frontend.quick_view') }}</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button title="{{ __('frontend.add_to_cart') }}" class="add-to-cart-btn  "> <a href="{{ route('add.to.cart',$pro->id) }}"> <i class="fa fa-shopping-cart"></i>{{ __('frontend.add_to_cart') }} </a></button>
                                        </div>

                                    </a>
                                </div>
                                @empty
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="fa fa-info"></i>{{ __('frontend.null') }}!</h5>
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
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{ __('frontend.top_selling') }} </h3>
                    <!-- <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                @forelse (topSellingProducts() as $pro)
                                <div class="product">
                                    <a href="{{ url('products/'.$pro->id.'/view') }}">
                                        <div class="product-img">
                                            <img src="{{ URL::asset('imges/products/'.$pro->thumbnail); }}" alt="{{$pro->name}} photo">
                                            <div class="product-label">
                                                <!-- <span class="sale">-30%</span> -->
                                                <span class="new">{{ __('frontend.new') }}</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ isset($pro->category->name) != null ? $pro->category->name : ''}}</p>
                                            <h3 class="product-name"><a title="{{ __('frontend.show') }}" href="{{ url('products/'.$pro->id.'/view') }}">{{ $pro->name ? $pro->name : ''}}</a></h3>
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
                                                <button class="quick-view" data-toggle="modal" data-target="#produt{{$id}}"><i class="fa fa-eye"></i><span class="tooltipp">{{ __('frontend.quick_view') }}</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button title="{{ __('frontend.add_to_cart') }}" class="add-to-cart-btn  "> <a href="{{ route('add.to.cart',$pro->id) }}"> <i class="fa fa-shopping-cart"></i> {{ __('frontend.add_to_cart') }}</a></button>
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
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@include('frontend.product.quick_view')
@stop