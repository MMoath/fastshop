@extends('layouts.frontend.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Check Order</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active"><b>Check Order</b></li>
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
							<h3 class="title">Billing address</h3>
						</div>
						<div class="form-group">
							<label for="name">NAME</label>
							<input id="name" class="input form-control " type="text" name="name" value="{{ $user->name }}" placeholder="Name" readonly>
						</div>
						<div class="form-group">
							<label for="email">E-MAIL</label>
							<input id="email" class="input form-control " type="email" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
						</div>
						<div class="form-group">
							<label for="telephone">TELEPHONE</label>
							<input id="telephone" class="input form-control " type="tel" name="tel" value="{{ $user->mobile }}" placeholder="Telephone" readonly>
						</div>
						<div class="form-group @error('address') has-error @enderror">
							<label for=" address"><sup style="color: red;">*</sup> DELIVERY ADDRESS</label>
							<input id="address" class="input form-control " type="text" name="address" value="{{ old('address') }}" placeholder="Delivery address" required>
							@error('address')

							<small style="color: red;">- {{ $message }}</small>

							@enderror
						</div>

						<!-- Order notes -->
						<div class="order-notes">
							<label for="notes"><small> IF YOU HAVE NOTES OF THE ORDER, PLEASE WRITE DOWN.</small></label>
							<textarea id="notes" name="notes" class="input form-control @error('name') is-invalid @enderror" placeholder="Order Notes">{{ old('notes') }}</textarea>
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
						<h3 class="title">Your Order</h3>
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
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">
							@if(count(yourCart()) !=0)
							@forelse(yourCart() as $pro)
							<div class="order-col">
								<div> <a title="Product review" href="{{ url('products/'.$pro->product->id.'/view') }}"> {{ isset($pro->product->name) != null ? $pro->product->name  : 'NULL'}} <i class="fa fa-external-link"></i> </a></div>
								<div>${{ isset($pro->product->price) !=null ? $pro->product->price : 'NULL'}}</div>
							</div>
							@empty
							<div class="alert alert-info alert-dismissible text-center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h5><i class="fa fa-info"></i> NULL!</h5>
								NO data.
							</div>
							@endforelse
							@endif

						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
							<div>Tax</div>
							<div><strong>$ 1</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div>
								<strong class="order-total">${{ sumPrice() +1 }}</strong>

							</div>
						</div>
					</div>
					<h3 class="text-center">PAYMENT METHOD</h3>
					<div class="payment-method @error('payment') has-error @enderror">

						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1" value="1" required>
							<label for="payment-1">
								<span></span>
								Direct Bank Transfer
							</label>
							<div class="caption">
								<p>You can transfer through your bank accounts to the store accounts through the following account numbers: DF10252305, RE85625252.</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-2" value="2" required>
							<label for="payment-2">
								<span></span>
								Direct Remittance Networks
							</label>
							<div class="caption">
								<p>You can transfer to the brand name of the store through any network of money transfers.</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-3" value="3" required>
							<label for="payment-3">
								<span></span>
								Cheque Payment
							</label>
							<div class="caption">
								<p>You can pay by bank check by mailing it to the store address.</p>
							</div>
						</div>
						<div class="input-radio paypal-input">
							<input type="radio" class="form-control" name="payment" id="payment-4" value="4" disabled>
							<label for="payment-4">
								<span></span>
								Paypal System
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
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<button type="submit" class="primary-btn order-submit" style="width: 100% ;">Place Your Order</button>
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