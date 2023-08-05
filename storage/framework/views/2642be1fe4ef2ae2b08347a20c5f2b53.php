<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="CmSeExxpkZmScDB9ArBZKMGKAyzPqnxEriplXWrS">
    
    <!-- Document Title -->
    
    <!-- Links -->
    

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(url('/')); ?>/landlord/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"></noscript>

    <!-- Plugins CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(url('/')); ?>/landlord/css/plugins.css">
    <noscript>
        <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo e(url('/')); ?>/landlord/css/plugins.css">
    </noscript>

    <!-- common style CSS -->
    <link href="<?php echo e(url('/')); ?>/landlord/css/common-style.css" rel="stylesheet">

    <!-- google fonts-->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap">
    <noscript>
        <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
            href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&display=swap">
        </noscript>


    <style>
        :root {
            --theme-color: #f16232;
        }

        .pricing {
            background-color: #FFF;
            text-align: center;
        }
        .pricing-header {
            background-color: #733686;
            font-size: 24px;
            padding: 20px 15px;
        }
        .pricing-header .h3 {
            color: #FFF !important;
        }
        .pricing-details p {
            padding: 20px 15px;
        }
        .pricing-details p i {
            font-weight: bold;
        }
        .pricing-details p .ti-check {
            color: green
        }
        .pricing-details p .ti-close {
            color: red
        }
        .pricing-details p:nth-child(even) {
            background-color: #ececec;
        }
        .price {
            align-items: center;
            background-color: #FFF;
            display: flex;
            justify-content: center;
            min-height: 130px;
            padding: 20px 15px;
        }

        .pricing-m {
            background-color: #FFF;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .pricing-m .pricing-header {
            align-items: center;
            background-color: transparent;
            display: flex;
            font-size: 24px;
            padding: 15px;
            width: 70%;
        }
        .pricing-m .pricing-header .h3 {
            color: #141414 !important;
        }
        .pricing-m .price {
            min-height: 80px;
        }
        .pricing-m .price span {
            color: #2aa6de;
            display: block;
            font-size: 20px;
        }
        .currency-code {
            color: #666;
            font-size: 14px;
        }
        .pricing-m .pricing-details:first-child {
            width: 70%
        }
        .pricing-m .pricing-details:last-child {
            text-align: center;
            width: 30%
        }
        .pricing-m .signup {
            padding: 15px;
        }
        .custom-control {
            position: relative;
            z-index: 1;
            display: block;
            min-height: 1.5rem;
            padding-left: 1.5rem;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            print-color-adjust: exact;
        }
        .custom-control-input {
            position: absolute;
            left: 0;
            z-index: -1;
            width: 1rem;
            height: 1.25rem;
            opacity: 0;
        }
        .custom-switch {
            padding-left: 2.25rem;
        }
        .custom-control-label {
            position: relative;
            margin-bottom: 0;
            padding-left: 10px;
            vertical-align: top;
        }
        .custom-switch .custom-control-label::before {
            left: -2.25rem;
            width: 2rem;
            pointer-events: all;
            border-radius: .5rem;
        }
        .custom-control-label::before, .custom-file-label, .custom-select {
            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .custom-control-label::before {
            position: absolute;
            top: .25rem;
            left: -1.5rem;
            display: block;
            width: 2rem;
            height: 1rem;
            pointer-events: none;
            content: "";
            background-color: #fff;
            border: 1px solid #adb5bd;
        }
        .custom-switch .custom-control-label::after {
            top: calc(.25rem - 1px);
            left: calc(-2.25rem);
            width: calc(1.15rem);
            height: calc(1.15rem);
            background-color: #adb5bd;
            border-radius: .5rem;
            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-transform .15s ease-in-out;
            transition: transform .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            transition: transform .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-transform .15s ease-in-out;
        }
        .custom-control-label::after {
            position: absolute;
            top: .25rem;
            left: -1.5rem;
            display: block;
            width: 1rem;
            height: 1rem;
            content: "";
            background: 50%/50% 50% no-repeat;
            background-color: rgba(0, 0, 0, 0);
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            color: #fff;
            border-color: #6d4bb0;
            background-color: #6d4bb0;
        }
        .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
            background-color: #fff;
            left: calc(-2rem);
            -webkit-transform: translateX(.75rem);
            transform: translateX(.75rem);
        }
    </style>

    
</head>

<body>
    <?php if(session()->has('not_permitted')): ?>
      <div class="alert alert-danger alert-dismissible text-center"><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>
    <!--Header-->
    <!--Header Area starts-->
    <?php if(!env('USER_VERIFIED')): ?>
    <div class="d-block text-center"><a class="button style1 w-100" href="https://lion-coders.com/software/salepro-saas">Buy Salepro SAAS</a></div>
    <?php endif; ?>
    <header id="header-middle" class="header-middle">

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-7">
                    <div class="mobile-menu-icon d-lg-none"><i class="ti-menu"></i></div>
                    <div class="logo">
                        <a href="<?php echo e(url('/')); ?>">
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                    <div id="main-menu" class="main-menu">
                        <ul class="pl-0">
                            <li><a href="<?php echo e(url('/')); ?>#features">Features</a></li>

                            <li><a href="<?php echo e(url('/')); ?>#faq">FAQ</a></li>

                            <li><a href="<?php echo e(url('/')); ?>#packages">Pricing</a></li>

                            <li><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                            
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-5" style="text-align:right">
                    <ul class="offset-menu-wrapper p-0 d-none d-lg-flex d-xl-flex">
                        
                        
                        <li>
                            <a class="button style2" href="#packages">Try Now</a>
                        </li>
                    </ul>
                    <a class="button style2 d-lg-none" href="#packages">Try Now</a>
                </div>
            </div>
        </div>
        <nav id="mobile-nav"></nav>
    </header>

    <section class="hero mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center hero-text mb-5">
                    <h1 class="heading"></h1>
                    <h2 class="light h5 mb-3"></h2>
                    <a href="#packages" class="button style1"></a>
                </div>
                <div class="col-md-8 offset-md-2">
                    
                </div>
            </div>
        </div>
    </section>

    

    

    

    <section id="packages"class="grey-bg">
        <div class="container">
            <div class="col-md-6 offset-md-3 text-center mb-5">
                <h2 class="regular">Pricing plans</h2>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="plan_type">
                    <label class="custom-control-label" for="plan_type">Show Yearly Price</label>
                </div>

            </div>
            <div class="d-none d-lg-flex d-xl-flex justify-content-between mb-5">
                <div class="col">
                    <div class="pricing">
                        <div class="pricing-header">
                            <span class="h3">Plan</span>
                        </div>
                        <div class="price">
                            <span class="h4">Price</span>
                        </div>
                        <div class="pricing-details">
                            <p class="bold"><?php echo e(trans('file.Free Trial')); ?></p>
                            <p class="bold">Product and Categories</p>
                            <p class="bold">Sale and Purchase</p>
                            <p class="bold">Sale Return</p>
                            <p class="bold">Purchase Return</p>
                            <p class="bold">Expenses</p>
                            <p class="bold">Stock Transfer</p>
                            <p class="bold">Quotation</p>
                            <p class="bold">Product Delivery</p>
                            <p class="bold">Stock Count and Adjustment</p>
                            <p class="bold">Reports</p>
                            <p class="bold">HRM</p>
                            <p class="bold">Accounting</p>
                            <p class="bold"><?php echo e(trans('file.Number of Warehouses')); ?></p>
                            <p class="bold"><?php echo e(trans('file.Number of Products')); ?></p>
                            <p class="bold"><?php echo e(trans('file.Number of Invoices')); ?></p>
                            <p class="bold"><?php echo e(trans('file.Number of User Account')); ?></p>
                            <p class="bold"><?php echo e(trans('file.Number of Employees')); ?></p>
                        </div>
                    </div>
                </div>
                
                <?php
                    // $features = json_decode($package->features);
                ?>
                <div class="col">
                    <div class="pricing">
                        <div class="pricing-header">
                            
                        </div>
                        <div class="price">
                            <div>
                                
                            </div>
                        </div>
                        <div class="pricing-details">
                            
                            

                            

                            

                            

                            

                            

                            

                            

                            
                        </div>
                    </div>
                </div>
                
            </div>

            
        </div>
    </section>

    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e(__('file.Testimonials')); ?></h2>
                </div>
            </div>
            <div class="swiper mySwiper swiper-container-horizontal swiper-container-autoheight">
                <div class="swiper-wrapper" style="height: 348px;">
                
                </div>
                <div class="swiper-nav-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="ti-arrow-right"></i></div>
                <div class="swiper-nav-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="ti-arrow-left"></i></div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </section>

    <section id="customer-signup">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-3">
                    
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-5">
                <form action="" method="POST"  class="form row customer-signup-form">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                        <input type="hidden" name="package_id" value="1">
                        <input type="hidden" name="subscription_type" value="monthly">
                        <input type="hidden" name="price" value="">
                        <input class="form-control" type="text" name="company_name"  placeholder="company name..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="phone_number"  placeholder="contact number..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email"  placeholder="email..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="name"  placeholder="username..." required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="password"  placeholder="password..." required>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mt-3">
                            <input class="form-control mt-0" type="text" name="tenant"  placeholder="subdomain..." aria-label="subdomain..." aria-describedby="basic-addon2" required>
                          <span class="input-group-text" id="basic-addon2"><?php echo e('@'.env('CENTRAL_DOMAIN')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card-element" class="form-control">
                        </div>
                        <div class="card-errors" role="alert"></div>
                    </div>
                    <div class="col-12 mt-3">
                        <p id="waiting-msg mb-3"></p>
                        <input id="submit-btn" type="submit" class="button style1 d-block w-100" value="<?php echo e(trans('file.submit')); ?>">
                    </div>
                </form>
            </div>
        </div>
    </section>
    

    <?php if(env('USER_VERIFIED')==0): ?>
    <section class="pt-5">
        <div class="container">
            <div class="place-cta row">
                <div class="col-md-8">
                    <h3 class="regular h3 white-txt">Start your software business today. Buy SalePro SAAS</h3>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="d-flex  justify-content-center">
                        <a class="button lg style3 mt-3" href="https://lion-coders.com/sale-pro-saas-purchase">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Footer section Starts-->
    
    <!-- Footer section Ends-->

    <!--Scroll to top starts-->
    <a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
    <!--Scroll to top ends-->

    <div class="body__overlay"></div>

    <!-- Cookie consent Starts-->


    <!-- Cookie consent Ends-->


    <!--Plugin js -->
    <script src="landlord/js/plugin.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="landlord/js/sweetalert2@11.js"></script>
    <!-- Main js -->
    <script src="landlord/js/main.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/payment/razorpay.js')); ?>"></script>

    

    

    <?php if(env('USER_VERIFIED')==0): ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D0S4KHQ1D6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-D0S4KHQ1D6');
    </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH /var/www/peopleprosaas/resources/views/landlord/public-section/landing_page/index.blade.php ENDPATH**/ ?>