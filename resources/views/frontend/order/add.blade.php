@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">{{ __('frontend.check_order') }}</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">{{ __('frontend.home') }}</a></li>
					<li class="active"><b>{{ __('frontend.check_order') }}</b></li>
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
			<form method="POST" action="{{ route('place.order') }}">
				@csrf
				<input type="hidden" name="user_id" value="{{ $user->id}}">
				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">{{ __('frontend.billing_address') }}</h3>
						</div>
						<div class="form-group">
							<label for="name">{{ __('frontend.name')}}</label>
							<input id="name" class="input form-control " type="text" name="name" value="{{ $user->name }}" placeholder="Name" readonly>
						</div>
						<div class="form-group">
							<label for="email">{{ __('frontend.email') }}</label>
							<input id="email" class="input form-control " type="email" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
						</div>
						<div class="form-group">
							<label for="telephone">{{ __('frontend.telephone') }}</label>
							<input id="telephone" class="input form-control " type="tel" name="tel" value="{{ $user->mobile }}" placeholder="Telephone" readonly>
						</div>
						<div class="form-group @error('address') has-error @enderror">
							<label for=" address"><sup style="color: red;">*</sup> {{ __('frontend.shiping_address') }}</label>
							<input id="address" class="input form-control " type="text" name="address" value="{{ old('address') }}" placeholder="{{ __('frontend.shiping_address') }}" required>
							@error('address')

							<small style="color: red;">- {{ $message }}</small>

							@enderror
						</div>

						<!-- Order notes -->
						<div class="order-notes">
							<label for="notes"><small> {{ __('frontend.notes_order') }}</small></label>
							<textarea id="notes" name="notes" class="input form-control @error('name') is-invalid @enderror" placeholder="{{ __('frontend.notes') }}">{{ old('notes') }}</textarea>
							@error('notes')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<!-- /Order notes -->
					</div>
					<!-- /Billing Details -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">

					<div class="section-title text-center">
						<h3 class="title">{{ __('frontend.your_order') }}</h3>
					</div>
					<!-- paginate -->
					<nav>
						<ul class="pager">
							<li>{{ yourCart()->links()}}</li>
						</ul>
					</nav>
					<!-- / paginate -->
					<div class="order-summary">
						<div class="order-col">
							<div><strong>{{ __('frontend.product') }}</strong></div>
							<div><strong>{{ __('frontend.total') }}</strong></div>
						</div>
						<div class="order-products">
							@if(count(yourCart()) !=0)
							@forelse(yourCart() as $pro)
							<div class="order-col">
								<div> <a title="Product review" href="{{ url('products/'.$pro->product->id.'/view') }}"> {{ isset($pro->product->name) != null ? $pro->product->name  : ''}} <i class="fa fa-external-link"></i> </a></div>
								<div>${{ isset($pro->product->selling_price) !=null ? $pro->product->selling_price : ''}}</div>
							</div>
							@empty
							<div class="alert alert-info alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
								{{ __('frontend.no_date') }}.
							</div>
							@endforelse
							@endif

						</div>
						<div class="order-col">
							<div>{{ __('frontend.shiping') }}</div>
							<div><strong>{{ __('frontend.free') }}</strong></div>
						</div>
						<div class="order-col">
							<div>{{ __('frontend.tax') }}</div>
							<div><strong>$1</strong></div>
						</div>
						<div class="order-col">
							<div><strong>{{ __('frontend.total') }}</strong></div>
							<div>
								<strong class="order-total">${{ sumPrice() +1 }}</strong>

							</div>
						</div>
					</div>
					<h3 class="text-center">{{ __('frontend.payment_method') }}</h3>
					<div class="payment-method @error('payment') has-error @enderror">

						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1" value="1" required>
							<label for="payment-1">
								<span></span>
								{{ __('frontend.direct_bank') }}
							</label>
							<div class="caption">
								<p>{{ __('frontend.direct_bank_des') }}
								</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-2" value="2" required>
							<label for="payment-2">
								<span></span>

								{{ __('frontend.direct_remittance') }}
							</label>
							<div class="caption">
								<p>{{ __('frontend.direct_remittance_des') }}
								</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-3" value="3" required>
							<label for="payment-3">
								<span></span>
								{{ __('frontend.cheque_payment') }}
							</label>
							<div class="caption">
								<p>{{ __('frontend.cheque_payment_des') }}
								</p>
							</div>
						</div>
						<div class="input-radio paypal-input">
							<input type="radio" class="form-control" name="payment" id="payment-4" value="4" disabled>
							<label for="payment-4">
								<span></span>
								{{ __('frontend.paypal_system') }}
							</label>
							<div class="caption">
								<p>Sorry, the electronic card payment service is currently suspended</p>
							</div>
						</div>
						@error('payment')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms" name="terms">
						<label for="terms">
							<span></span>

							{{ __('frontend.terms_name') }} <a href="#">{{ __('frontend.terms_conditions') }}</a>
						</label>
					</div>
					<button type="submit" class="primary-btn order-submit  btn-success" style="width: 100% ;">{{ __('frontend.place_order') }}</button>
				</div>
				<!-- /Order Details -->
			</form>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop