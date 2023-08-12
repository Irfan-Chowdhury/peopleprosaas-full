<?php
    $generalSetting =  DB::table('general_settings')->latest()->first();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="CmSeExxpkZmScDB9ArBZKMGKAyzPqnxEriplXWrS">
    
    <!-- Document Title -->
    
    <title>PeoplePro SAAS</title>
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
                            <img class="lazy" src="<?php echo e(asset('landlord/images/logo/'. $generalSetting->site_logo)); ?>">
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
                        <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($social->link); ?>"><i class="<?php echo e($social->icon); ?>"></i></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
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
                    <h1 class="heading"><?php echo e($hero->heading); ?></h1>
                    <h2 class="light h5 mb-3"><?php echo e($hero->sub_heading); ?></h2>
                    <a href="#packages" class="button style1"><?php echo e($hero->button_text); ?></a>
                </div>
                <div class="col-md-8 offset-md-2">
                    <img class="hero-img" src="<?php echo e(asset('landlord/images/hero/'.$hero->image)); ?>" alt=""/>
                </div>
            </div>
        </div>
    </section>



    <section id="features" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e($module->heading); ?></h2>
                    <p class="lead mb-5"><?php echo e($module->sub_heading); ?></p>
                </div>
                <div class="col-md-5">
                    <?php if(isset($module) && $module->image): ?>
                        <img class="mb-5" src="<?php echo e(asset('landlord/images/module/'.$module->image)); ?>" alt="Module image"/>
                    <?php else: ?>
                        <img class="mb-5" src="landlord/images/preview.png" alt=""/>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="row">
                        <?php $__currentLoopData = $module->moduleDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 feature">
                            <div class="icon">
                                <i class="<?php echo e($module->icon); ?>"></i>
                            </div>
                            <h3><?php echo e($module->name); ?></h3>
                            <p><?php echo e($module->description); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(count($features) > 0): ?>
    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 feature2">
                    <div class="icon">
                        <i class="<?php echo e($feature->icon); ?>"></i>
                    </div>
                    <h4 class="h6"><?php echo e($feature->name); ?></h4>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(isset($faq)): ?>
        <section id="faq" class="accordion pb-0" id="accordionExample">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center mb-5">
                        <h2 class="regular"><?php echo e($faq->heading); ?></h2>
                        <p class="lead"><?php echo e($faq->sub_heading); ?></p>
                    </div>
                    <div class="col-md-6 offset-md-3 mb-5">
                        <?php $__currentLoopData = $faq->faqDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapse1">
                                    <?php echo e($item->question); ?>

                                </button>
                                </h2>
                                <div id="collapse-<?php echo e($key); ?>" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php echo $item->answer; ?>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>




    

    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular"><?php echo e(__('file.Testimonials')); ?></h2>
                </div>
            </div>
            <div class="swiper mySwiper swiper-container-horizontal swiper-container-autoheight">
                <div class="swiper-wrapper" style="height: 348px;">
                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="swiper-slide swiper-slide-active" style="width: 563px; margin-right: 50px;">
                        <div class="review">
                            <div class="review-text">
                                <?php echo $testimonial->description; ?>

                            </div>
                            <div class="reviewer"><img src="<?php echo e(asset('landlord/images/testimonial')); ?>/<?php echo e($testimonial->image); ?>" alt="<?php echo e($testimonial->name); ?>" /> <?php echo e($testimonial->name); ?><?php if($testimonial->business_name): ?>, <?php echo e($testimonial->business_name); ?><?php endif; ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
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
                    <?php if($tenantSignupDescription): ?>
                        <h2 class="regular"><?php echo e($tenantSignupDescription->heading); ?></h2>
                        <p class="lead mb-3"><?php echo e($tenantSignupDescription->sub_heading); ?></p>
                    <?php else: ?>
                        <h2 class="regular">Customer Irfan Up</h2>
                        <p class="lead mb-3">SalePro is packed with all the features you'll need to seamlessly run your business</p>
                    <?php endif; ?>
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

    
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <?php if(isset($general_setting->ga_script)): ?>
    <?php echo $general_setting->ga_script; ?>

    <?php endif; ?>

    <?php if(isset($general_setting->chat_script)): ?>
    <?php echo $general_setting->chat_script; ?>

    <?php endif; ?>

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