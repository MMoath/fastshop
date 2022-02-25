<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">{{ __('frontend.about_us') }}</h3>
                        {!! __('frontend.web_des') !!}
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>{{ __('frontend.web_marker') }}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+967-774-474-100</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>CS@fastshop.com</a></li>
                        </ul>
                    </div>
                </div>
                @if(categories() != 'null' && count(categories()) > 0)
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">{{ __('frontend.top_categories') }}</h3>
                        <ul class="footer-links">
                            @forelse(categories() as $cat)
                            <li><a title="{{$cat->name}}" href="{{ route('category',$cat->id) }}">{{$cat->name}}</a></li>
                            @empty
                            NULL
                            @endforelse
                        </ul>
                    </div>
                </div>
                @endif

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">{{ __('frontend.service') }}</h3>
                        <ul class="footer-links">
                            <li><a title="Account" href="{{ route('account') }}">{{ __('frontend.account') }}</a></li>
                            <li><a title="Cart" href="{{ route('cart') }}">{{ __('frontend.cart') }}</a></li>
                            <li><a title="Wishlist" href="{{ route('wishlist') }}">{{ __('frontend.wishlist') }}</a></li>
                            <li><a title="Order" href="{{ route('order') }}">{{ __('frontend.order') }}</a></li>
                            <li><a title="Help" href="{{ route('build.up') }}">{{ __('frontend.help') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">{{ __('frontend.information') }}</h3>
                        <ul class="footer-links">
                            <li><a href="{{ route('build.up') }}">{{ __('frontend.about_us') }}</a></li>
                            <li><a href="{{ route('build.up') }}">{{ __('frontend.contact_us') }}</a></li>
                            <li><a href="{{ route('build.up') }}">{{ __('frontend.privacy_policy') }}</a></li>
                            <li><a href="{{ route('build.up') }}">{{ __('frontend.privacy_policy') }}</a></li>
                            <li><a href="{{ route('build.up') }}">{{ __('frontend.terms_conditions') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ URL::asset('frontend/js/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/bootstrap.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/slick.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/nouislider.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/jquery.zoom.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/main.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/sweetalert.min.js'); }}"></script>

@include('layouts.massage.sweetalert')
</body>

</html>