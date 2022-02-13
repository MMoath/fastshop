@include('layouts.admin.include.header')



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a title=" Fast shop " href="{{url('/')}}" class="brand-link text-center">
        <!-- <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light" style="color:#fff700">Fast Shop</span>
        <small><sub>Dashboard</sub></small>



    </a>



    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Route::has('login'))


        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::asset('imges/users/'.Auth::user()->picture); }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @auth
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>

            </div>
            @endauth

        </div>
        @endif


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('admin.add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('admin.details') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders') }}" class="nav-link">
                     
                        <i class=" nav-icon ion ion-bag"></i>
                        <p>
                            Orders
                      
                        </p>
                    </a>
                </li>

            </ul>
            <div style="position: fixed; bottom:1rem;">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined ">
                    <button title="off" type="button" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-outline-danger btn-sm"><i class="fas fa-power-off"></i></button>
                    <button title="reload window" type="button" onclick='window.location.reload();' class="btn btn-outline-info btn-sm"><i class="fas fa-redo"></i></button>
                </div>


            </div>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bc">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('conternt_title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @yield('breadcrumb')



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>

@include('layouts.admin.include.footer')