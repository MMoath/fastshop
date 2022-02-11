@extends('layouts.frontend.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">My Account</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{ route('welcome' )}}">Home</a></li>
					<li class="active">Profile</li>
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
			<div class="col-xs-12 col-md-2">
				<a class="thumbnail">
					<img src="{{ URL::asset('imges/users/'.$user->picture); }}" alt="{{ $user->name }} photo" style="height: 15rem; width:15rem;">
				</a>
				<div class="list-group">
					<a class="list-group-item active">
						SERVICE
					</a>
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge">( {{ yourCart()->total() }} )</span>
							<a href="{{ route('cart') }}">Your Cart</a>
						</li>
						<li class="list-group-item">
							<span class="badge">( {{ $user->orders->count() }} )</span>
							<a href="{{ route('order') }}">Your Order</a>
						</li>
						<li class="list-group-item ">
							<span class="badge"> ( {{ yourWishlist()->total() }} )</span>
							<a href="{{ route('wishlist') }}">Your Wishlist</a>
						</li>
					</ul>
				</div>
				<ul class="list-group">
					<li>
						<a href="#" class="list-group-item disabled">Returns</a>
					</li>
					<li>
						<a href="#" class="list-group-item disabled">Track Your Order</a>
					</li>
				</ul>


			</div>
			<div class="col-xs-12 col-md-9">
				@if(count($errors)>0)
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">
						<span><b>YOUR PROFILE</b></span>
						<div class=" text-right">
							<div class="btn-group btn-group-sm" role="group">
								<button title="edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">Edit</button>
								<button title="change password" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-change_password">Change Password</button>
							</div>
						</div>

					</div>
					<div class="panel-body">
						<div class="card-body box-profile">
							<div class="text-center img-circle thumbnail">
								<img class=" profile-user-img img-fluid img-circle" src="{{ URL::asset('imges/users/'.$user->picture); }}" alt="User profile picture" style="height: 25rem;width:25rem">
							</div>
							<br>
							<h3 class="profile-username text-center"><em>{{ $user->name ? $user->name : 'No data'}}</em></h3>

							<p class="text-muted text-center">{{ $user->email ? $user->email : 'No data'}}</p>

							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<b>Gender :</b>
									<a class="float-right">{{ $user->gender ? $user->gender : 'No data' }}</a>
								</li>
								<li class="list-group-item">
									<b>Mobile :</b>
									<a class="float-right">{{ $user->mobile ? $user->mobile : 'No data' }}</a>
								</li>
								<li class="list-group-item">
									<b>Group user : </b>
									@if($user->role == 1)
									<a><span class="float-right">Administration</span></a>
									@elseif($user->role == 2)
									<a class="float-right">Costmer</a>
									@endif


								</li>
								<li class="list-group-item">
									<b>Account Status :</b>
									@if($user->account_status == 1)
									<span class="label label-success float-right">Enabled</span>
									@elseif($user->account_status == 0)
									<span class="label label-danger float-right">Disabled</span>
									@endif
								</li>
								<li class="list-group-item">
									<b>Created At :</b>
									<a class="float-right">{{ $user->created_at ? $user->created_at->format('d-M-Y , h:i a') : 'No data' }}</a>
								</li>
								<li class="list-group-item">
									<b>Updated At :</b>
									<a class="float-right">{{ $user->updated_at ? $user->updated_at->format('d-M-Y , h:i a') : 'No data' }}</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@include('frontend.account.change_password')
@include('frontend.account.edit_user')
@stop