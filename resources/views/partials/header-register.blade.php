<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" href="apple-touch-icon.html" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
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
                        <img src="images/favicon.png" alt="Creed Profit Alliance" />
                    </div>
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="Creed Profit Alliance" class="letters-loading"> Creed Profit Alliance </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
        </div>
        <!-- welcome content start from here -->
        <!--========== Header Section Start ==============-->
        <header class="sc-header-section" id="sc-header-sticky">
            <div class="sc-topbar-section sc-topbar-section-three">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="sc-header-content-left">
                                <ul class="list-gap white-color">
                                    <li>
                                        <i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=447413729810"> 447413729810</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-paper-plane"></i><a href="https://t.me/customersupportCPA"> customersupportCPA</a>
                                    </li>
                                    <li>
                                        <i class="icon-message"></i
                                        ><a href="cdn-cgi/l/email-protection.html#c4adaaa2ab84a7b6a1a1a0b4b6aba2adb0a5a8a8ada5aaa7a1eaa7aba9"> <span class="__cf_email__" data-cfemail="4e272028210e2d3c2b2b2a3e3c2128273a2f2222272f202d2b602d2123">[email&#160;protected]</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sc-header-content-right align-items-center d-flex justify-content-end">
                                <div class="sc-header-date">
                                    <ul class="list-gap sc-date">
                                        <li><i class="icon-timer"></i> 24/7 Service</li>
                                    </ul>
                                </div>
								                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Section Start -->
          @include('partials.navbar')
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
                            <div class="sc-slider-subtitle">Home - Register</div>
                            <h1 class="slider-title white-color sc-mb-25 sc-sm-mb-15">Account Registration</h1>
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
