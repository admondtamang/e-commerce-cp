<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="wrapper ">
            <div class="sidebar" data-color="white" data-active-color="danger">
                <!--
                    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
                -->
                <div class="logo">
                    <a href="/" class="simple-text logo-mini">
                        <div class="logo-image-small">
                            <img src="{{asset('images/shop.png')}}" class="img-fluid mr-1" width="70" alt="{{ config('app.name', 'Laravel') }}">                            }}

                        </div>
                    </a>
                    <a href="/" class="simple-text logo-normal">
                      Store Panel 
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">

                        <li class="{{ Request::is('store') ? " active " : " " }}">
                            <a href="{{ route('store.dashboard') }}" class="">
                            <span class="icon-holder"><i class="fas text-primary fa-home"></i> </span>
                            Dashboard</a>

                        </li>

                        <li class="{{ Request::is('store/category') ? " active " : " " }}"><a href="{{ route('category.index') }}"><span class="icon-holder"><i class="fas text-success fa-bookmark"></i> </span>Category</a></li>
                        <li class="{{ Request::is('store/products') ? " active " : " " }}"><a href="{{ route('products.index') }}"><span class="icon-holder"><i class="fab fa-product-hunt"></i></i> </span>Product</a></li>
                        <li class="{{ Request::is('store/order') ? " active " : " " }}"><a href="{{ route('store.order') }}"><span class="icon-holder"><i class="fas text-secondary fa-football-ball"></i> </span>Order</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span class="icon-holder"><i class="fas fa-sign-out-alt"></i> </span>Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>

                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                      </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <form>
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search products...">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    @yield('content')
                </div>



                <script src="{{ asset('js/app.js') }}"></script>
                <script src="{{ asset('js/paper-dashboard.js')}}"></script>
</body>

</html>