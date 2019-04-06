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
        {{--
        <div class="ribbon">
            <ul class="container">
                @guest
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('User Login') }}</a></li>
                <li><a href="{{ route('store.login') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('Store Login') }}</a></li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"><i class="fa fa-user-circle mr-1"></i>{{ __('Register') }}</a>
                </li>
                @endif @else
                <li><a href="#"><i class="fa fa-heart mr-1"></i>WhishList</a></li>
                <li><a href="{{ route('profile.index') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('Profile') }}</a></li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        v-pre>
                        <i class="fa fa-user-circle mr-1" aria-hidden="true"></i>{{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div> --}} {{-- End of ribbon --}}


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

                        <li class="{{ Request::is('/store') ? " active " : " " }}">
                            <a href="{{ route('store.dashboard') }}" class="text-bold">
                            <span class="icon-holder"><i class="fas text-primary fa-home"></i> </span>
                            Dashboard</a>

                        </li>

                        <li class="{{ Request::is('/store/category') ? " active " : " " }}"><a href="{{ route('category.index') }}"><span class="icon-holder"><i class="fas text-success fa-bookmark"></i> </span>Category</a></li>
                        <li class="{{ Request::is('/store/products') ? " active " : " " }}"><a href="{{ route('products.index') }}"><span class="icon-holder"><i class="fas text-danger fa-football-ball"></i> </span>Product</a></li>
                        <li class="{{ Request::is('/') ? " active " : " " }}"><a href="{{ route('store.order') }}"><span class="icon-holder"><i class="fas text-secondary fa-football-ball"></i> </span>Order</a></li>
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


                {{--
                <main class="py-4 container">
                    <div class="row">
                        <aside class="col-xs-4 col-lg-4">
                            <div class="logo">
                                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                                    <div class="logo-image-small">
                                        <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{asset('images/shop.png')}}" class="img-fluid mr-1" width="70" alt="{{ config('app.name', 'Laravel') }}">
                                    Admin Dashboard
                                </a>
                                    </div>
                                </a>
                            </div>
                            <ul class="sidebar-menu">
                                <li><a href="{{ route('store.dashboard') }}"><span class="icon-holder"><i class="fas text-primary fa-home"></i> </span>Dashboard</a></li>
                                <li><a href="{{ route('category.index') }}"><span class="icon-holder"><i class="fas text-success fa-bookmark"></i> </span>Category</a></li>
                                <li><a href="{{ route('products.index') }}"><span class="icon-holder"><i class="fas text-danger fa-football-ball"></i> </span>Product</a></li>
                                <li><a href="{{ route('products.index') }}"><span class="icon-holder"><i class="fas text-secondary fa-football-ball"></i> </span>Chat</a></li>
                            </ul>
                        </aside>
                        <section class="col-xs-8 col-lg-8">

                            @yield('content')
                        </section>
                    </div>
                </main> --}}
                <script src="{{ asset('js/app.js') }}"></script>
                <script src="{{ asset('js/paper-dashboard.js')}}"></script>

</body>

</html>