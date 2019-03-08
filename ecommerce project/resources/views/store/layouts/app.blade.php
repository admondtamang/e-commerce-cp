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
    <link href="{{ asset('css/style.css') }}" rel ="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="ribbon">
            <ul class="container">
                <li><a href="#"><i class="fa fa-heart mr-1"></i>WhishList</a></li>
                @guest
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('User Login') }}</a></li>
                <li><a href="{{ route('store.login') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('Store Login') }}</a></li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"><i class="fa fa-user-circle mr-1"></i>{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li><a href="{{ route('profile.index') }}"><i class="fa fa-sign-in-alt mr-1"></i>{{ __('Profile') }}</a></li>
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle mr-1" aria-hidden="true"></i>{{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
                        
                       
	<div class="container">
        @yield('content')
    </div>
        
        
    </div> <!-- End of App div -->
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </body>
    </html>
    