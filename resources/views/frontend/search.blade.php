@extends('layouts.frontend.master')
@section('content')


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<h2 class="text-center" style="color: #D10024;"> <i class="fa fa-search"></i> Research Results ...
				<hr>
			</h2>
			@if(count($products) == 0)
			<div class="alert alert-info alert-dismissible text-center">
				<h4>Sorry, there are no search results !</h4>
			</div>
			@endif
			@if(count($products) != 0)
			<!-- row -->
			<div class="row">
				<table class="table table-hover table-responsive-sm table-sm border-primary">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Product Name</th>
							<th scope="col">Price</th>
							<th scope="col">Thumbnail</th>
							<th scope="col">Category</th>
						</tr>
					</thead>
					<tbody>
						<?php $number = 0; ?>
						@forelse($products as $pro)
						<?php $number++ ?>

						<tr>
							<th>{{ $number}}</th>
							<td><a title="view" href="{{ url('products/'.$pro->id.'/view') }}">{{$pro->name}} <i class="fa fa-external-link"></i> </a></td>
							<td>$ {{$pro->price}}</td>
							<td><img src="{{  URL::asset('imges/products/'.$pro->img); }}" alt="" style="max-height:10rem;"></td>
							<td>{{$pro->category->name}}</td>
						</tr>
						@empty
						<tr>
							<td colspan="5">
								<div class="alert alert-info alert-dismissible text-center">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h5><i class="fa fa-info"></i> NULL!</h5>
									NO data.
								</div>
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				<nav aria-label="Page navigation">
					<ul class="pager">
						<li>{{ $products->links() }}</li>
					</ul>
				</nav>
			</div>
			<!-- /row -->
			@endif
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@stop