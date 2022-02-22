@extends('layouts.admin.master')
@section('conternt_title')
Users <small><sub>({{ $users->total() }})</sub></small> | <a title=" add users" href="{{ route('admin.users.add') }}" type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-user-plus"></i> Add Users </a>
@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Users</li>
</ol>
@stop
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ALL USERS</h3>

                        <div class="card-tools">
                            <form method="POST" action="{{ route('admin.users.search') }}">
                                @csrf
                                <div class="input-group input-group-sm" style="width: 15rem;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request()->search }}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-center table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Account Status</th>
                                    <th>Created at</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody class="table_over">
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ isset($user->id) ? $user->id : '' }}</td>
                                    <td>{{ isset($user->name) ? $user->name : '' }}</td>
                                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                                    <td>{{ isset($user->mobile) ? $user->mobile : '' }}</td>
                                    <td>{{ isset( $user->gender) ?  $user->gender : ''}}</td>
                                    <td>
                                        @if($user->role == 1)
                                        Administration
                                        @elseif($user->role > 1)
                                        customer
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->account_status == 1)
                                        <span class="badge bg-success">Enabled</span>
                                        @elseif($user->account_status == 0)
                                        <span class="badge bg-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>{{ isset($user->created_at) ? $user->created_at->format('d-M-Y , h:i a') : '' }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined ">
                                            <a href="{{ route('admin.users.show',$user->id) }}" title="show" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="table-danger"><b>No records !</b></td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $users->links() !!}
                        </ul>
                        <p><b>{!! $users->total() !!} records</b></p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@stop