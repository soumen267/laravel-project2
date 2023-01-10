<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyApp') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        
    <!-- Custom CSS -->
    
    @livewireStyles
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
    #app > .active{
        background: #5a88ca; color:#FFF;
    }
    .error{
        margin-top: 4px;
        color: red;
    }
    </style>
    @stack('style')
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row bg-secondary py-1 px-xl-5">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center h-100">
                        <a class="text-body mr-3" href="">About</a>
                        <a class="text-body mr-3" href="{{ route('contact') }}">Contact</a>
                        <a class="text-body mr-3" href="">Help</a>
                        <a class="text-body mr-3" href="">FAQs</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <div class="btn-group">
                            @guest
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if (Route::has('login'))
                                    <li class="nav-item" style="list-style: none;">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item" style="list-style: none;">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            </div>
                            @else
                                <li class="nav-item dropdown" style="list-style: none;">
                                    <li class="dropdown dropdown-small" style="list-style: none;">
                                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                            <span class="value">{{ Auth::user()->name }}</span>
                                            <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li style="list-style: none;"><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a></li>
                                                <li style="list-style: none;"><a class="dropdown-item" href="{{ route('user.index') }}"><i class="fa fa-user"></i> Profile</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                    </form>
                                            </ul>
                                    </li> 
                                </li>
                            @endguest
                        </div>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">EUR</button>
                                <button class="dropdown-item" type="button">GBP</button>
                                <button class="dropdown-item" type="button">CAD</button>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">FR</button>
                                <button class="dropdown-item" type="button">AR</button>
                                <button class="dropdown-item" type="button">RU</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-flex align-items-center d-block d-lg-none">
                        <a href="" class="btn px-0 ml-2">
                            <i class="fas fa-heart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="" class="btn px-0 ml-2">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
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