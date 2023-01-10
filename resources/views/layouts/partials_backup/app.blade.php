<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @livewireStyles
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
    #app > .active{
        background: #5a88ca; color:#FFF;
    }
    </style>
</head>
<body>
    <div id="app">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                                <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                                <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li> --}}
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a> --}}
                                        <li class="dropdown dropdown-small">
                                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                                <span class="value">{{ Auth::user()->name }}</span>
                                                <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                    </form>
                                            </ul>
                                        </li> 
                                        {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div> --}}
                                    </li>
                                @endguest
                                
                                
                                {{-- <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                        <span class="value">##</span>
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="logout.php"><i class="fa fa-user"></i> Logout</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">INR</a></li>
                                        <li><a href="#">GBP</a></li>
                                    </ul>
                                </li>
        
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.header')
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @include('layouts.partials.sidebar')
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> --}}
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')
    @livewireScripts
    @stack('script')
</body>
</html>