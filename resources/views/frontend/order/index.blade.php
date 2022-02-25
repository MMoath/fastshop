@extends('layouts.frontend.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">{{ __('frontend.order')}}</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome') }}">{{ __('frontend.home') }}</a></li>
					<li class="active">{{ __('frontend.order') }}</li>
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
			@if(isset($user->orders) !=null)
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
				$number = 0;
				$type = "";
				?>
				@forelse ($user->orders->sortByDesc('id') as $order)
				<?php $number++ ?>


				@switch($order->status)
				@case(0)
				<?php $type = "danger"; ?>
				@break
				@case(1)
				<?php $type = "warning"; ?>
				@break

				@case(2)
				<?php $type = "info"; ?>

				@break

				@case(3)
				<?php $type = "success"; ?>

				@break

				@case(4)
				<?php $type = "default"; ?>

				@break

				@default
				<?php $type = "default"; ?>

				@endswitch

				<div class="panel panel-{{ $type }}">
					<div class="panel-heading" role="tab" id="heading-{{ $number }}">
						@if($order->status == 3)
						<a href="{{ route('order.change.status',['id'=>$order->id,'change'=>4]) }}" type="button" class="btn btn-success btn-sm" style="float: right;"><i class="fa fa-check"></i>{{ __('frontend.confirm_rquest') }} </a>
						@endif
						<h4 class="panel-title">

							<a title="veiw" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $number }}" aria-expanded="false" aria-controls="collapse-{{ $number }}">
								@if($order->status == 4)
								<i class="fa fa-check"></i> {{ __('frontend.order_delivered') }}
								@else
								{{ __('frontend.order')}} ( {{ $number }} )
								@endif

							</a>

						</h4>

					</div>
					<div id="collapse-{{ $number }}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading-{{ $number }}">
						<div class="panel-body">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<th scope="row" style="width: 15%;">{{ __('frontend.customer_id')}} </th>
										<th scope="row">{{ isset($user->id) !=null ? $user->id : ''}}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>{{ __('frontend.email') }}</th>
										<td>{{ isset($user->email) !=null ? $user->email : ''}}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.shiping_address') }}</th>
										<td>{{ isset($order->address) !=null ? $order->address : ''}}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.price') }}</th>
										<td>${{ isset($order->price) !=null ? $order->price : ''}}</td>

									</tr>
									<tr>
										<th scope="row">{{ __('frontend.payment_method') }}</th>
										<td>


											@switch($order->payment_method)
											@case(1)
											<span>{{ __('frontend.direct_bank') }}</span>
											@break

											@case(2)
											<span>{{ __('frontend.direct_remittance') }}</span>
											@break

											@case(3)
											<span>{{ __('frontend.cheque_payment') }}</span>
											@break

											@case(4)
											<span>{{ __('frontend.paypal_system') }}</span>
											@break

											@default
											<span>{{ __('frontend.something_wrong') }}</span>
											@endswitch
										</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.status') }}</th>
										<td>


											@switch($order->status)
											@case(0)
											<span class="label label-danger">{{ __('frontend.cancel')}}</span>

											@break

											@case(1)
											<span class="label label-warning">{{ __('frontend.pending')}}</span>

											@break

											@case(2)
											<span class="label label-info">{{ __('frontend.processing') }}</span>

											@break

											@case(3)
											<span class="label label-success">{{ __('frontend.shipped')}}<i class="fa fa-truck"></i> </span>

											@break

											@case(4)
											<span class="label label-default ">{{ __('frontend.delivered')}}<i class="fa fa-check"></i></span>
											@break

											@default
											<span>{{ __('frontend.something_wrong') }}</span>
											@endswitch
										</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.created_at') }}</th>
										<td> {{ isset($order->created_at) !=null ? $order->created_at->format('(d-M-Y) | h:ia ') : ''}}</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.order_details')}} </th>
										<td>
											@foreach($order->products as $pro)
											- {{ $pro->name}} <br>
											@endforeach
										</td>
									</tr>
									<tr>
										<th scope="row">{{ __('frontend.notes')}} </th>
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
					<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
					{{ __('frontend.no_data') }}.
				</div>

				@endforelse

			</div>
			@else
			<div class="alert alert-info alert-dismissible text-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="fa fa-info"></i> {{ __('frontend.null') }}!</h5>
				{{ __('frontend.no_data') }}.
			</div>
			@endif

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop