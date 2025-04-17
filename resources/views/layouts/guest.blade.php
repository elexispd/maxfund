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
        <section class="sc-footer-section footer-bg-image1 sc-pt-120 sc-md-pt-80">
            <div class="container">
                <div class="sc-footer-subscribe d-flex align-items-center justify-content-between">
                    <div class="sc-subscribe-text">
                        <h3 class="sc-subscribe-title white-color mb-0">Subscribe Newsletter</h3>
                    </div>
                    <div class="sc-form-inner p-z-idex d-flex align-items-center justify-content-end">
                        <div class="input-field">
                            <input type="email" id="address" name="email" placeholder="Enter your email" required="" disabled />
                            <i class="icon-send"></i>
                        </div>
                        <div class="sc-primary-btn">
                            <input class="sc-footer-submit" type="submit" id="submitSix" value="Subscribe Now" disabled />
                        </div>
                    </div>
                </div>
                <div class="row sc-pt-80 sc-pb-100 sc-md-pb-80">
                    <div
                        class="col-lg-6 col-md-6"
                        data-sal="slide-up"
                        data-sal-duration="500"
                        data-sal-delay="100"
                    >
                        <div class="footer-about sc-md-mb-45">
                            <div class="footer-logo sc-mb-30">
                                <a href="index-2.html"><img src="images/logo-1.png" alt="Creed Profit Alliance" style="width:150px; height:100px;"/></a>
                            </div>
                            <p class="footer-des">
                                At Creed Profit Alliance, we are committed to providing exceptional customer service and personalized attention to all our clients.
                            </p>

                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 sc-xs-mt-40"
                        data-sal="slide-up"
                        data-sal-duration="500"
                        data-sal-delay="200"
                    >
                        <div class="footer-menu-area sc-pl-35 sc-md-pl-40 sc-sm-mb-0">
                            <h4 class="footer-title white-color sc-md-mb-15">Useful Links</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="footer-menu-list">
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="index-2.html#plans">Investment Plans</a></li>
                                        <li><a href="terms.html">Terms & Privacy</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <div class="sc-contact-number border-style d-flex align-items-center">
                                <div class="phone-icon">
                                    <i class="fab fa-whatsapp" style="font-size:18px; color:green; font-weight:bold; padding:5px;"></i>
                                </div>
                                <div class="contact-number">

                                    <a href="https://api.whatsapp.com/send?phone=" class="number"> </a>
                                </div>
                            </div>
                                                            </div>
                            </div>
                        </div>
                    </div>

					                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text text-center">
                                <p>© 2025 <a href="#" target="_blank"> Creed Profit Alliance, </a> All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=========== Footer Section End =========-->

        <!--Sc Offcanvas Area Start-->
        <div id="sc-overlay-bg2" class="sc-overlay-bg2"></div>
        <div class="sc-product-offcanvas-area">
            <div class="sc-offcanvas-header d-flex align-items-center justify-content-between">
                <div class="sticky-logo logo-area text-center">
                    <a href="index-2.html"><img src="images/logo-1.png" alt="Logo" width="140px"/></a>
                </div>
                <div class="offcanvas-icon">
                    <a id="canva_close" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="25px" height="25px">
                            <path
                                d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"
                            />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Canvas Mobile Menu start -->
            <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
				<ul class="nav-menu sc-mb-45 sc-pl-0">
                                        <li  class="list-gap">
                                            <a class="" href="index-2.html"> Home</a>
                                        </li>
                                        <li class="list-gap">
                                            <a href="about.html"> About Us</a>
                                        </li>
                                        <li class="list-gap">
                                            <a href="faq.html"> FAQ</a>
                                        </li>
                                        <li class="list-gap">
                                            <a href="services.html"> Services</a>
                                        </li>
                                        <li class="list-gap menu-item-has-children">
                                            <a href="#"> Account</a>
                                            <ul class="list-gap sub-menu-list">
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="login.html">Login</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-gap"><a href="contact.html">Contact</a></li>
                   </ul>

              </nav>
            <!-- Canvas Menu end -->
            <div class="sc-offcanvas-list-info">
                <p class="des sc-mb-20">
                    Building a world-class financial solutions.
                </p>
                <h4 class="product-title">Contact Info</h4>
                <ul class="list-gap">
                    <li>
                        <i class="icon-map"></i>
                        4 New Road, Lesmahagow, Lanark, ML11 0EX                    </li>
                    <li><i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone="></a></li>
                    <li><i class="icon-mail"></i><a href="cdn-cgi/l/email-protection.html#b6dfd8d0d9f6d5c4d3d3d2c6c4d9d0dfc2d7dadadfd7d8d5d398d5d9db"><span class="__cf_email__" data-cfemail="1e777078715e7d6c7b7b7a6e6c7178776a7f7272777f707d7b307d7173">[email&#160;protected]</span></a></li>
                </ul>
            </div>
			            <div class="sc-canva-button">
                <a class="sc-primary-btn" href="register.html">Get Started</a>
            </div>
			        </div>
        <!--Sc Offcanvas Area End-->



        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="icon-angle_right"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- start scrollUp  -->
        <div class="boxfin-scroll-top progress-done">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path
                    d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="
                        transition: stroke-dashoffset 10ms linear 0s;
                        stroke-dasharray: 307.919px, 307.919px;
                        stroke-dashoffset: 71.1186px;
                    "
                ></path>
            </svg>
            <div class="boxfin-scroll-top-icon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    role="img"
                    width="1em"
                    height="1em"
                    viewBox="0 0 24 24"
                    data-icon="mdi:arrow-up"
                    class="iconify iconify--mdi"
                >
                    <path
                        fill="currentColor"
                        d="M13 20h-2V8l-5.5 5.5l-1.42-1.42L12 4.16l7.92 7.92l-1.42 1.42L13 8v12Z"
                    ></path>
                </svg>
            </div>
        </div>
        <!-- End scrollUp  -->

        <!-- jquery.min js -->

        <!-- modernizr.js -->
        <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/modernizr-2.8.3.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap.min js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- magnific.min js -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Swiper.min js -->
        <script src="assets/js/swiper.min.js"></script>
        <!-- appear js -->
        <script src="assets/js/jquery.appear.min.js"></script>
        <!-- odometer js -->
        <script src="assets/js/odometer.min.js"></script>
        <!-- sal js -->
        <script src="assets/js/sal.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>

		<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_open_direction":"top","switcher_text_color":"#f7f7f7","switcher_arrow_color":"#f2f2f2","switcher_border_color":"#161616","switcher_background_color":"#303030","switcher_background_shadow_color":"#474747","switcher_background_hover_color":"#3a3a3a","dropdown_text_color":"#eaeaea","dropdown_hover_color":"#748393","dropdown_background_color":"#474747"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>

<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.eu/widget?wc=siqda3606ca1d4348996a5f0595115c88267304ab3035a1be2f61c60866af218bd7" defer></script>
    </body>

<!-- Mirrored from creedprofitalliance.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Apr 2025 09:14:44 GMT -->
</html>


