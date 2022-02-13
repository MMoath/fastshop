@extends('layouts.frontend.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Order</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">Home</a></li>
					<li class="active">Order</li>
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
			@if(isset($user->orders) !=null)
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php $number = 0; ?>
				@forelse ($user->orders as $order)
				<?php $number++ ?>

				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading-{{ $number }}">
						<h4 class="panel-title">
							<a title="veiw" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $number }}" aria-expanded="false" aria-controls="collapse-{{ $number }}">
								Order ( {{ $number }} )
							</a>
						</h4>
					</div>
					<div id="collapse-{{ $number }}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading-{{ $number }}">
						<div class="panel-body">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th scope="row" style="width: 15%;">Customer ID :</th>
										<th scope="row">{{ isset($user->id) !=null ? $user->id : 'NULL'}}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>E-mail</th>
										<td>{{ isset($user->email) !=null ? $user->email : 'NULL'}}</td>
									</tr>
									<tr>
										<th scope="row">Shiping Address</th>
										<td>{{ isset($order->address) !=null ? $order->address : 'NULL'}}</td>
									</tr>
									<tr>
										<th scope="row">Price</th>
										<td>$ {{ isset($order->price) !=null ? $order->price : 'NULL'}}</td>

									</tr>
									<tr>
										<th scope="row">Payment Method</th>
										<td>


											@switch($order->payment_method)
											@case(1)
											<span>Direct Bank Transfer</span>
											@break

											@case(2)
											<span>Direct Remittance Networks</span>
											@break

											@case(3)
											<span>Cheque Payment</span>
											@break

											@case(4)
											<span> Paypal System</span>
											@break

											@default
											<span>Something went wrong, please try again</span>
											@endswitch
										</td>
									</tr>
									<tr>
										<th scope="row">Status</th>
										<td>


											@switch($order->status)
											@case(1)
											<span class="label label-default">Pending</span>
											@break

											@case(2)
											<span class="label label-info">Processing</span>
											@break

											@case(3)
											<span class="label label-warning">Shipped<i class="fa fa-truck"></i> </span>
											@break

											@case(4)
											<span class="label label-success"> Delivered <i class="fa fa-check"></i></span>
											@break

											@case(5)
											<span class="label label-danger">Fail</span>
											@break

											@default
											<span>Something went wrong, please try again</span>
											@endswitch
										</td>
									</tr>
									<tr>
										<th scope="row">Created At</th>
										<td> {{ isset($order->created_at) !=null ? $order->created_at->format('d-M-Y , h:i a') : 'NULL'}}</td>
									</tr>
									<tr>
										<th scope="row">Order Details </th>
										<td>
											@foreach($order->products as $pro)
											- {{ $pro->name}} <br>
											@endforeach
										</td>
									</tr>
									<tr>
										<th scope="row">Notes </th>
										<td>
											{{ isset($order->notes) !=null ? $order->notes : 'NULL'}}
										</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
				@empty
				<div class="alert alert-info alert-dismissible text-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="fa fa-info"></i> NULL!</h5>
					NO data.
				</div>

				@endforelse

			</div>
			@else
			<div class="alert alert-info alert-dismissible text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="fa fa-info"></i> NULL!</h5>
				NO data.
			</div>
			@endif

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop