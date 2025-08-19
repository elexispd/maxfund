<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

      
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/newlogo.jpg') }}" />
        <!-- Bootstrap  v5.1.3 css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <!-- Sall css -->
        <link rel="stylesheet" type="text/css" href="assets/css/sal.css" />
        <!-- magnific css -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css" />
        <!-- Swiper Slider css -->
        <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css" />
        <!-- Remixicon Fonts css -->
        <link rel="stylesheet" type="text/css" href="assets/css/ico-fonts.css" />
        <!-- Remixicon Fonts css -->
        <link rel="stylesheet" type="text/css" href="assets/css/odometer.min.css" />
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

         <!-- preloader -->
        
        <!-- welcome content start from here -->
        <!--========== Header Section Start ==============-->
        <header class="sc-header-section" id="sc-header-sticky">
@include('partials.header')
            <!-- Header Section Start -->
         <div class="sc-header-content sc-header-content-style3">
    <div class="container">
        <div class="row align-items-center justify-content-between p-z-idex">
            <div class="col-lg-9 col-6">
                <div class="sc-menu-inner d-flex align-items-center">
                    <div class="sc-header-logo sc-pr-112">
                        <a href="/"><img src="{{ asset('assets/img/newlogo.jpg') }}" alt="Logo" style="width: 90px; border-radius: 50%; height: 90px; " /></a>
                    </div>
                    <div class="sc-main-menu d-lg-block d-none">
                        <!-- Mainmenu Section Start -->
                        <ul class="list-gap main-menu">
                            <li >
                                <a class="" href="/"> Home</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}"> About Us</a>
                            </li>
                            <li>
                                <a href="{{route('faq')}}"> FAQ</a>
                            </li>
                            <li>
                                <a href="{{route('services')}}"> Services</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#"> Account</a>
                                <ul class="list-gap sub-menu-list">
                                    <li><a href="{{route('register')}}">Register</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                        <!-- Mainmenu Section End -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="sc-menu-select-box d-flex align-items-center justify-content-end">

                    <div class="sc-hambagur-icon d-none sc-mr-20">
                        <a id="canva_expander" href="#" class="nav-menu-link menu-button">
                            <span class="dot1"></span>
                            <span class="dot2"></span>
                            <span class="dot3"></span>
                        </a>
                    </div>
                    <div class="header-btn sc-lg-hide">
                        <a href="#"><i class="ri-search-line"></i></a>
                        <a class="sc-primary-btn" href="{{route('register')}}" style="background: blueviolet !important">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</header>
<div style="position:fixed; float:right; bottom:40%; z-index: 100; font-size:60px; color:blue; right:0; margin-right:20px;">
    <a href="https://api.whatsapp.com/send?phone=31683297212" style="border-radius:20%; background:white;padding:2px;"><i class="fab fa-whatsapp"></i></a>
</div>

        </header>
        <div style="position:fixed; float:right; bottom:40%; z-index: 100; font-size:60px; color:blue; right:0; margin-right:20px;">
            <a href="https://api.whatsapp.com/send?phone=447413729810" style="border-radius:20%; background:white;padding:2px;"><i class="fab fa-whatsapp"></i></a>
        </div>
        <!--========== Header Section End ==============-->
        <!--=========== breadcrumb Section Start =========-->
        <div class="sc-breadcrumb-style sc-pt-135 sc-pb-110">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sc-slider-content p-z-idex">
                            <div class="sc-slider-subtitle">Home - Login</div>
                            <h1 class="slider-title white-color sc-mb-25 sc-sm-mb-15">Account Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/" wire:navigate>
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                </a>
            </div>

            <div class="w-full  mt-6 px-6 mx-3 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="width: 80% !important">
                {{ $slot }}
            </div>
        </div>





        <!--=========== Footer Section Start =========-->
       @include('partials.footer')