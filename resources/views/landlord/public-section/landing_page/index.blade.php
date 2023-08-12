@php
    $generalSetting =  DB::table('general_settings')->latest()->first();

@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="CmSeExxpkZmScDB9ArBZKMGKAyzPqnxEriplXWrS">
    {{-- <link rel="icon" type="image/png" href="{{url('public/landlord/images/logo', $general_setting->site_logo)}}" /> --}}
    <!-- Document Title -->
    {{-- <title>{{$general_setting->meta_title ?? 'PeoplePro SAAS'}}</title> --}}
    <title>PeoplePro SAAS</title>
    <!-- Links -->
    {{-- <meta name="description" content="{{$general_setting->meta_description ?? 'Buy SalePro inventory management & POS SAAS php script'}}" />
    <meta property="og:url" content="{{url()->full()}}" />
    <meta property="og:title" content="{{$general_setting->og_title ?? 'SalePro SAAS'}}" />
    <meta property="og:description" content="{{$general_setting->og_description ?? 'Buy SalePro inventory management & POS SAAS php script'}}" />
    <meta property="og:image" content="{{url('/public/landlord/images/og-image')}}/{{$general_setting->og_image ?? 'saleprosaas.jpg'}}" /> --}}

    <!-- Bootstrap CSS -->
    <link href="{{url('/')}}/landlord/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"></noscript>

    <!-- Plugins CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{url('/')}}/landlord/css/plugins.css">
    <noscript>
        <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{url('/')}}/landlord/css/plugins.css">
    </noscript>

    <!-- common style CSS -->
    <link href="{{url('/')}}/landlord/css/common-style.css" rel="stylesheet">

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

    {{-- @if(isset($general_setting->fb_pixel_script))
    {!!$general_setting->fb_pixel_script!!}
    @endif --}}
</head>

<body>
    {{-- @if(session()->has('not_permitted'))
      <div class="alert alert-danger alert-dismissible text-center">{{ session()->get('not_permitted') }}</div>
    @endif --}}
    <!--Header-->
    <!--Header Area starts-->
    @if(!env('USER_VERIFIED'))
    <div class="d-block text-center"><a class="button style1 w-100" href="https://lion-coders.com/software/salepro-saas">Buy Salepro SAAS</a></div>
    @endif
    <header id="header-middle" class="header-middle">

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-7">
                    <div class="mobile-menu-icon d-lg-none"><i class="ti-menu"></i></div>
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img class="lazy" src="{{asset('landlord/images/logo/'. $generalSetting->site_logo)}}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                    <div id="main-menu" class="main-menu">
                        <ul class="pl-0">
                            <li><a href="{{url('/')}}#features">Features</a></li>

                            <li><a href="{{url('/')}}#faq">FAQ</a></li>

                            <li><a href="{{url('/')}}#packages">Pricing</a></li>

                            <li><a href="{{url('/blog')}}">Blog</a></li>
                            {{-- @if(count($languages) > 1)
                            <li class="d-lg-none dropdown">
                                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Language
                                </a>
                                <div class="dropdown-menu">
                                @foreach($languages as $language)
                                    <a class="dropdown-item" href="{{url('switch-landing-page-language/'.$language->id)}}">{{$language->name}}</a>
                                @endforeach
                                </div>
                            </li>
                            @endif --}}
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-5" style="text-align:right">
                    <ul class="offset-menu-wrapper p-0 d-none d-lg-flex d-xl-flex">
                        @foreach($socials as $social)
                            <li>
                                <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                            </li>
                        @endforeach
                        {{-- @if(count($languages) > 1)
                        <li class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Lang
                            </button>
                            <div class="dropdown-menu">
                                @foreach($languages as $language)
                                <a class="dropdown-item" style="line-height:1.5" href="{{url('switch-landing-page-language/'.$language->id)}}">{{$language->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        @endif --}}
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
                    <h1 class="heading">{{$hero->heading}}</h1>
                    <h2 class="light h5 mb-3">{{$hero->sub_heading}}</h2>
                    <a href="#packages" class="button style1">{{$hero->button_text}}</a>
                </div>
                <div class="col-md-8 offset-md-2">
                    <img class="hero-img" src="{{asset('landlord/images/hero/'.$hero->image)}}" alt=""/>
                </div>
            </div>
        </div>
    </section>



    <section id="features" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular">{{$module->heading}}</h2>
                    <p class="lead mb-5">{{$module->sub_heading}}</p>
                </div>
                <div class="col-md-5">
                    @if(isset($module) && $module->image)
                        <img class="mb-5" src="{{asset('landlord/images/module/'.$module->image)}}" alt="Module image"/>
                    @else
                        <img class="mb-5" src="landlord/images/preview.png" alt=""/>
                    @endif
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="row">
                        @foreach($module->moduleDetails as $module)
                        <div class="col-md-6 feature">
                            <div class="icon">
                                <i class="{{$module->icon}}"></i>
                            </div>
                            <h3>{{$module->name}}</h3>
                            <p>{{$module->description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($features) > 0)
    <section class="grey-bg">
        <div class="container">
            <div class="row">
                @foreach($features as $feature)
                <div class="col-md-3 feature2">
                    <div class="icon">
                        <i class="{{$feature->icon}}"></i>
                    </div>
                    <h4 class="h6">{{$feature->name}}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(isset($faq))
        <section id="faq" class="accordion pb-0" id="accordionExample">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center mb-5">
                        <h2 class="regular">{{$faq->heading}}</h2>
                        <p class="lead">{{$faq->sub_heading}}</p>
                    </div>
                    <div class="col-md-6 offset-md-3 mb-5">
                        @foreach($faq->faqDetails as $key => $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="false" aria-controls="collapse1">
                                    {{$item->question}}
                                </button>
                                </h2>
                                <div id="collapse-{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!!$item->answer!!}
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif




    {{-- <section id="packages"class="grey-bg">
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
                            <p class="bold">{{trans('file.Free Trial')}}</p>
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
                            <p class="bold">{{trans('file.Number of Warehouses')}}</p>
                            <p class="bold">{{trans('file.Number of Products')}}</p>
                            <p class="bold">{{trans('file.Number of Invoices')}}</p>
                            <p class="bold">{{trans('file.Number of User Account')}}</p>
                            <p class="bold">{{trans('file.Number of Employees')}}</p>
                        </div>
                    </div>
                </div>
                @foreach($packages as $package)
                <?php
                    $features = json_decode($package->features);
                ?>
                <div class="col">
                    <div class="pricing">
                        <div class="pricing-header">
                            <span class="h3">{{$package->name}}</span>
                        </div>
                        <div class="price">
                            <div>
                                <span class="h4"><span class="currency-code">{{$general_setting->currency}}</span> <span class="package-price" data-monthly="{{$package->monthly_fee}}" data-yearly="{{$package->yearly_fee}}">{{$package->monthly_fee}}/month</span></span><br>
                                <button href="#customer-signup" data-free="{{$package->is_free_trial}}" data-package_id="{{$package->id}}" class="button style2 signup-btn">Sign Up</button>
                            </div>
                        </div>
                        <div class="pricing-details">
                            @if($package->is_free_trial)
                                <p>{{$general_setting->free_trial_limit}} days</p>
                            @else
                                <p>N/A</p>
                            @endif
                            @if(in_array("product_and_categories", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("purchase_and_sale", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("sale_return", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("purchase_return", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("expense", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("transfer", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("quotation", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("delivery", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("stock_count_and_adjustment", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("report", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("hrm", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if(in_array("accounting", $features))
                                <p><i class="ti-check"></i></p>
                            @else
                                <p><i class="ti-close"></i></p>
                            @endif

                            @if($package->number_of_warehouse)
                                <p>{{$package->number_of_warehouse}}</p>
                            @else
                                <p>{{trans('file.Unlimited')}}</p>
                            @endif

                            @if($package->number_of_product)
                                <p>{{$package->number_of_product}}</p>
                            @else
                                <p>{{trans('file.Unlimited')}}</p>
                            @endif

                            @if($package->number_of_invoice)
                                <p>{{$package->number_of_invoice}}</p>
                            @else
                                <p>{{trans('file.Unlimited')}}</p>
                            @endif

                            @if($package->number_of_user_account)
                                <p>{{$package->number_of_user_account}}</p>
                            @else
                                <p>{{trans('file.Unlimited')}}</p>
                            @endif

                            @if($package->number_of_employee)
                                <p>{{$package->number_of_employee}}</p>
                            @else
                                <p>{{trans('file.Unlimited')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @foreach($packages as $package)
            <?php
                $features = json_decode($package->features);
            ?>
            <div class="pricing-m d-block d-lg-none d-xl-none mb-5">
                <div class="d-flex justify-content-between">
                    <div class="pricing-header">
                        <span class="h3">{{$package->name}}</span>
                    </div>
                    <div class="price">
                        <span class="h4"><span class="currency-code">{{$general_setting->currency}}</span> <span class="package-price" data-monthly="{{$package->monthly_fee}}" data-yearly="{{$package->yearly_fee}}">{{$package->monthly_fee}}/month</span></span>
                    </div>
                </div>
                <div class="price">
                    <button href="#customer-signup" data-free="{{$package->is_free_trial}}" data-package_id="{{$package->id}}" class="button style2 d-block w-100 signup-btn">Sign Up</button>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="pricing-details">
                        <p class="bold">{{trans('file.Free Trial')}}</p>
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
                        <p class="bold">{{trans('file.Number of Warehouses')}}</p>
                        <p class="bold">{{trans('file.Number of Products')}}</p>
                        <p class="bold">{{trans('file.Number of Invoices')}}</p>
                        <p class="bold">{{trans('file.Number of User Account')}}</p>
                        <p class="bold">{{trans('file.Number of Employees')}}</p>
                    </div>
                    <div class="pricing-details">
                        @if($package->is_free_trial)
                            <p>{{$general_setting->free_trial_limit}} days</p>
                        @else
                            <p>N/A</p>
                        @endif
                        @if(in_array("product_and_categories", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("purchase_and_sale", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("sale_return", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("purchase_return", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("expense", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("transfer", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("quotation", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("delivery", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("stock_count_and_adjustment", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("report", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("hrm", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if(in_array("accounting", $features))
                            <p><i class="ti-check"></i></p>
                        @else
                            <p><i class="ti-close"></i></p>
                        @endif

                        @if($package->number_of_warehouse)
                            <p>{{$package->number_of_warehouse}}</p>
                        @else
                            <p>{{trans('file.Unlimited')}}</p>
                        @endif

                        @if($package->number_of_product)
                            <p>{{$package->number_of_product}}</p>
                        @else
                            <p>{{trans('file.Unlimited')}}</p>
                        @endif

                        @if($package->number_of_invoice)
                            <p>{{$package->number_of_invoice}}</p>
                        @else
                            <p>{{trans('file.Unlimited')}}</p>
                        @endif

                        @if($package->number_of_user_account)
                            <p>{{$package->number_of_user_account}}</p>
                        @else
                            <p>{{trans('file.Unlimited')}}</p>
                        @endif

                        @if($package->number_of_employee)
                            <p>{{$package->number_of_employee}}</p>
                        @else
                            <p>{{trans('file.Unlimited')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section> --}}

    <section class="grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular">{{ __('file.Testimonials') }}</h2>
                </div>
            </div>
            <div class="swiper mySwiper swiper-container-horizontal swiper-container-autoheight">
                <div class="swiper-wrapper" style="height: 348px;">
                @forelse($testimonials as $testimonial)
                    <div class="swiper-slide swiper-slide-active" style="width: 563px; margin-right: 50px;">
                        <div class="review">
                            <div class="review-text">
                                {!!$testimonial->description!!}
                            </div>
                            <div class="reviewer"><img src="{{asset('landlord/images/testimonial')}}/{{$testimonial->image}}" alt="{{$testimonial->name}}" /> {{$testimonial->name}}@if($testimonial->business_name), {{$testimonial->business_name}}@endif</div>
                        </div>
                    </div>
                @empty
                @endforelse
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
                    @if($tenantSignupDescription)
                        <h2 class="regular">{{$tenantSignupDescription->heading}}</h2>
                        <p class="lead mb-3">{{$tenantSignupDescription->sub_heading}}</p>
                    @else
                        <h2 class="regular">Customer Sign Up</h2>
                        <p class="lead mb-3">SalePro is packed with all the features you'll need to seamlessly run your business</p>
                    @endif
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-5">
                <form action="" method="POST"  class="form row customer-signup-form">
                    @csrf
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
                          <span class="input-group-text" id="basic-addon2">{{'@'.env('CENTRAL_DOMAIN')}}</span>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card-element" class="form-control">
                        </div>
                        <div class="card-errors" role="alert"></div>
                    </div>
                    <div class="col-12 mt-3">
                        <p id="waiting-msg mb-3"></p>
                        <input id="submit-btn" type="submit" class="button style1 d-block w-100" value="{{trans('file.submit')}}">
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if(count($blogs) > 0)
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center mb-5">
                    <h2 class="regular">{{ __('file.Blog') }}</h2>
                </div>
                @foreach($blogs as $blog)
                <div class="col-md-4">
                    <a href="{{url('/blog')}}/{{$blog->slug}}">
                        <img src="{{asset('landlord/images/blog')}}/{{$blog->image}}" alt="{{$blog->title}}"/>
                        <h4 class="mt-3">{{$blog->title}}</h4>
                    </a>
                </div>
                @endforeach
                <div class="col-md-6 offset-md-3 text-center mt-3 mb-5">
                    <a href="{{url('blog')}}" class="button style1">{{ __('file.All Blogs') }}</a>
                </div>
            </div>
        </div>

    </section>
    @endif

    {{-- @if(env('USER_VERIFIED')==0)
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
    @endif --}}

    <!-- Footer section Starts-->
    {{-- <div class="footer-wrapper pt-0">
        <div class="container">
            <div class="footer-links">
                @foreach($pages as $page)
                <a href="{{url('page/'.$page->slug)}}">{{$page->title}}</a>
                @endforeach
            </div>
            <div class="footer-bottom">
                <ul class="footer-social p-0 pt-3 pb-3">
                    @foreach($socials as $social)
                    <li>
                        <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                    </li>
                    @endforeach
                </ul>
                <p class="copyright">&copy; {{$general_setting->site_title}} {{date_format(date_create(date('Y-m-d')), $general_setting->date_format)}}. All rights reserved</p>
            </div>
        </div>
    </div> --}}
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
    <script type="text/javascript" src="{{ asset('js/payment/razorpay.js') }}"></script>

    {{-- <script>
        let targetURL = "{{ url('/payment/razorpay/pay/confirm')}}";
        let cancelURL = "{{ url('payment/razorpay/pay/cancel')}}";
        let redirectURL = "{{ url('/payment_success')}}";
        let redirectURLAfterCancel = "{{ url('/payment_cancel')}}";

        $("div.alert").delay(3000).slideUp(800);
        var public_key = <?php echo json_encode($general_setting->stripe_public_key)?>;
        var active_payment_gateway = <?php echo json_encode($general_setting->active_payment_gateway)?>;
        (function ($) {
            "use strict";

            $(".card-element").hide();
            $(".card-errors").hide();

            $('.banner-slide-up').on('click', function () {
                $(this).parent().slideUp();
            });

            $(document).ready(function () {
                $('#newsletter-modal').modal('toggle');
            });

            $(".signup-btn").on("click", function () {
                $('input[name=package_id]').val($(this).data('package_id'));
                if($('input[name=subscription_type]').val() == 'monthly') {
                    $('input[name=price]').val($(this).parent().parent().find('.package-price').data('monthly'));
                } else {
                    $('input[name=price]').val($(this).parent().parent().find('.package-price').data('yearly'));
                }
                $('html, body').animate({
                    scrollTop: $("#customer-signup").offset().top
                });
            });

            $("#plan_type").change(function(){
                if($("#plan_type").is(':checked')){
                    $('input[name=subscription_type]').val('yearly');

                    $(".package-price").each(function(){
                        var plan = $(this).data('yearly')+'/year';
                        $(this).html(plan);
                    })
                }
                else {
                    $('input[name=subscription_type]').val('monthly');
                    $(".package-price").each(function(){
                        var plan = $(this).data('monthly')+'/month';
                        $(this).html(plan);
                    })
                }
            })

            $('input[name=tenant]').on('input', function () {
                var tenant = $(this).val();
                var letters = /^[a-zA-Z0-9]+$/;
                if(!letters.test(tenant)) {
                    alert('Tenant name must be alpha numeric(a-z and 0-9)!');
                    tenant = tenant.substring(0, tenant.length-1);
                    $('input[name=tenant]').val(tenant);
                }
            });

            $(document).on('submit', '.customer-signup-form', function(e) {
                $("#submit-btn").prop('disabled', true);
                $("p#waiting-msg").text("Please wait. It will take some few seconds. System will redirect you to the tenant url automatically.")
            });

            //Search field
            $('#search_field').hide();

            $(document).ready(function () {
                $('#searchText').keyup(function () {
                    var txt = $(this).val();
                    if (txt != '') {
                        $('#search_field').show();
                        $('#result').html('<li>loading...</li>');
                        $.ajax({
                            url: "data_ajax_search",
                            type: "GET",
                            data: {
                                search_txt: txt
                            },
                            success: function (data) {
                                $('#search_field').show();
                                $('#result').empty().html(data);
                            }
                        })
                    } else if (txt.length === 0) {
                        $('#search_field').hide();
                    } else {
                        $('#search_field').hide();
                        $('#result').empty();
                    }
                })
            });

            $('#stripeContent').hide();

            $(window).on('load', function () {

                $('.lazy').Lazy();
            });

        })(jQuery);
    </script> --}}
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    @if(isset($general_setting->ga_script))
    {!!$general_setting->ga_script!!}
    @endif

    @if(isset($general_setting->chat_script))
    {!!$general_setting->chat_script!!}
    @endif

    @if(env('USER_VERIFIED')==0)
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D0S4KHQ1D6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-D0S4KHQ1D6');
    </script>
    @endif
</body>
</html>
