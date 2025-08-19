<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from creedprofitalliance.com/services by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Apr 2025 09:14:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8" />
        <title>Maxfund - Building worldclass investment portfolio with good returns.</title>
        <meta name="description" content="" />
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- favicon -->
       
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

    </head>
    <body>
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
        </div>        <!-- welcome content start from here -->
        <!--========== Header Section Start ==============-->
        <header class="sc-header-section" id="sc-header-sticky">
          @include('partials.header')
            <!-- Header Section Start -->
@include('partials.navbar')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Available Investment Plans</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($investmentPlans as $plan)
                        <div class="col-md-4 mb-4" >
                            <div class="card plan-card h-100">
                                <div class="card-body text-center">
                                    <h3 class="card-title" style="font-size:1rem; color:#191970">{{ $plan->name }}</h3>
                                    <div class="plan-details mt-4">
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Daily Profit:</span>
                                            <strong>{{ $plan->interest_rate }}%</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Minimum:</span>
                                            <strong>${{ number_format($plan->min_amount, 2) }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Maximum:</span>
                                            <strong>${{ number_format($plan->max_amount, 2) }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Duration:</span>
                                            <strong>{{ $plan->duration_days }} days</strong>
                                        </div>
                                    </div>
                                    <a href="{{ route('user.investment.create', $plan->slug) }}"
                                        class="btn  btn-round mt-4" style="background:#191970; color:white">
                                        Invest Now
                                     </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .plan-card {
        transition: transform 0.3s ease;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>






        <!--=========== Footer Section Start =========-->
        @include('partials.footer')
