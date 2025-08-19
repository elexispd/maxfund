<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/img/newlogo.jpg') }}?v={{ time() }}">

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


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

         <!-- preloader -->
         <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">
                    <div class="loader-icon">
                        <img src="assets/img/newlogo.jpg" alt="Maxfund" />
                    </div>
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="Maxfund" class="letters-loading"> Maxfund </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
        </div>
        <!-- welcome content start from here -->
        <!--========== Header Section Start ==============-->
        <header class="sc-header-section" id="sc-header-sticky">
@include('partials.header')
            <!-- Header Section Start -->
          @include('partials.navbar')
        
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
