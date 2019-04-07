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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> {{--
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />

</head>

<body>
    <div id="app">
        <div class="ribbon">
            <ul class="container">
                @guest
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('User Login') }}</a></li>
                <li><a href="{{ route('store.login') }}"><i class="fas fa-store-alt mr-1"></i>{{ __('Store Login') }}</a></li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"><i class="fa fa-user-circle mr-1"></i>{{ __('Register') }}</a>
                </li>
                @endif @else
                <li><a href="{{route('wishlist.index')}}"><i class="fa fa-heart mr-1"></i>WishList</a></li>
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
        </div>
        {{-- End of ribbon --}}

        <header>
            <div class="container">
                <div class="row">
                    <div class="search col-xs-4 col-md-4 col-lg-4 pt-1">
                        <form action="{{route('product.search')}}" method="POST">
                            @csrf
                            <input type="text" class="materialTextbox text-dark" name="search" tabindex="2">
                            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="brand col-xs-4 col-md-4 col-lg-4 d-flex justify-content-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                                            <img src="{{asset('images/shop.png')}}" class="img-fluid mr-1" width="70" alt="{{ config('app.name', 'Laravel') }}">{{ config('app.name', 'Laravel') }}
                                        </a>
                    </div>
                    <div class="shopping-cart col-xs-4 col-md-4 col-lg-4 d-flex justify-content-end">
                        <div class="cart">
                            <img src="{{asset('images/cart.png')}}" class="img-fluid mr-2" width="50" alt="CART">
                            <div class="checkout d-flex flex-column mt-1">
                                <a href="{{ url('/cart') }}">Check Out 
                                    <span class="badge badge-warning">
                                        {{-- @if(App\Cart::count()->where('session_id',App\Cart)>0)
                                            {{App\Cart::count()}}
                                        @else
                                        @endif  --}}
                                    </span>
                                </a>
                                <p>0.00 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <nav class="navbar-expand-lg mt-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bigheart-nav" aria-controls="bigheart-nav"
                aria-expanded="false" aria-label="Toggle navigation">                                    <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span></button>
            <!-- Menu Area Start -->
            <div class="collapse navbar-collapse justify-content-center" id="bigheart-nav">
                <ul class="navbar-nav" id="bigheart-nav">
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="bigheartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="bigheartDropdown">
                            <a class="dropdown-item text-weight-bold" href="{{ url('/') }}">Home</a>
                            <a class="dropdown-item" href="archive.html">Archive</a>
                            <a class="dropdown-item" href="single.html">Single Blog</a>
                            <a class="dropdown-item" href="static.html">Static Page</a>
                            <a class="dropdown-item" href="contact.html">Contact</a>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link" href="#">Men's</a>
                    </li>
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link" href="#">Women</a>
                    </li>
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link" href="#">Brands</a>
                    </li>
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link " href="/about.blade.php">About</a>
                    </li>
                    <li class="nav-item {{ Request::is('/') ? " active " : " " }}">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>



        <main class="py-4 container">
            @yield('content')
        </main>



        <!-- FOOTER -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-logo">
                            <img src="{{asset('images/shop.png')}}" alt="logo">
                        </div>
                        <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on
                            (+1) 96 716 6879</p>


                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-header">My Account</h3>
                            <ul class="list-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-md-3 col-sm-5 col-xs-5">
                        <div class="footer">
                            <h3 class="footer-header">Customer Service</h3>
                            <ul class="list-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Shiping & Return</a></li>
                                <li><a href="#">Shiping Guide</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-7 col-xs-7">
                        <div class="footer">
                            <h3 class="footer-header">Stay Connected</h3>
                            <p>Subscribe us for Newsletter.</p>
                            <form>
                                <div class="form-group d-flex">
                                    <input class="form-control mr-1" placeholder="Email Address">
                                    <input type="submit" name="submit" class="btn btn-dark" value="SUSCRIBE">
                                </div>
                            </form>
                            <!-- footer social -->
                            <ul class="footer-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <!-- footer copyright -->
                <div class="footer-copyright text-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Developed with <i class="fas fa-heart" aria-hidden="true"></i>.
                </div>
                <!-- /footer copyright -->
            </div>

    </div>



    </div>
    <!-- End of App div -->
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
    <script>
        // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
    </script>
    <script>
        $(document).ready(function(){
            $('.slide').slick({
                dots:false
            });
    });
    </script>

</body>

</html>