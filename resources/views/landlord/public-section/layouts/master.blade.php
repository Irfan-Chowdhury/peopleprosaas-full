

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="CmSeExxpkZmScDB9ArBZKMGKAyzPqnxEriplXWrS">
    {{-- <link rel="icon" type="image/png" href="{{aseet('landlord/images/logo', $general_setting->site_logo)}}" /> --}}
    <!-- Document Title -->
    {{-- <title>{{$general_setting->meta_title ?? 'SalePro SAAS'}}</title> --}}
    <!-- Links -->
    {{-- <meta name="description" content="{{$general_setting->meta_description ?? 'Buy SalePro inventory management & POS SAAS php script'}}" />
    <meta property="og:url" content="{{url()->full()}}" />
    <meta property="og:title" content="{{$general_setting->og_title ?? 'SalePro SAAS'}}" />
    <meta property="og:description" content="{{$general_setting->og_description ?? 'Buy SalePro inventory management & POS SAAS php script'}}" />
    <meta property="og:image" content="{{url('/public/landlord/images/og-image')}}/{{$general_setting->og_image ?? 'saleprosaas.jpg'}}" /> --}}

    <!-- Bootstrap CSS -->
    <link href="{{asset('landlord/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="preload" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"></noscript>

    <!-- Plugins CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('landlord/css/plugins.css')}}">
    <noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('landlord/css/plugins.css')}}"></noscript>

    <!-- common style CSS -->
    <link id="switch-style" href="{{url('landlord/css/common-style-light.css')}}" rel="stylesheet">

    <!-- google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- @if(isset($general_setting->fb_pixel_script))
    {!!$general_setting->fb_pixel_script!!}
    @endif --}}

    @stack('css')

</head>

<body>

    @if(!env('USER_VERIFIED'))
        <div class="notice">
            <a target="_blank" href="https://lion-coders.com/software/salepro-saas">Buy Salepro SAAS with full source code</a>
        </div>
    @endif

    @if(env('USER_VERIFIED'))
        <div style="position:fixed;right:0;top:200px;z-index:99">
            <span id="light-theme" class="btn btn-light d-block"><i class="fa fa-sun-o"></i></span>
            <span id="dark-theme" class="btn btn-dark d-block"><i class="fa fa-moon-o"></i></span>
        </div>
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

                            <li><a href="{{url('/blogs')}}">Blogs</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-5" style="text-align:right">
                    <ul class="offset-menu-wrapper p-0 d-none d-lg-flex d-xl-flex">
                        <li class="has-dropdown">
                            <i class="fa fa-globe" aria-hidden="true"></i> English
                            <div class="dropdown">
                                @foreach($languages as $language)
                                    <a href="#">{{$language->name}}</a>
                                @endforeach
                            </div>
                        </li>

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
    @yield('public-content')



    <!-- Footer section Starts-->

    {{-- <div class="footer-wrapper pt-0">
        <div class="container">
            <div class="footer-links">
                @foreach($pages as $key => $page)
                    <a href="{{url('pages/'.$page->slug)}}">{{$page->title}} &nbsp; @if($key !== (count($pages)-1)) | @endif</a>
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

    <!-- Footer section Starts-->
    <div class="footer-wrapper">
        <div class="container">
            @if (env('PRODUCT_MODE')==='DEMO')
                <div class="mt-5 mb-5 cta">
                    <h3 class="h1 mb-5">Start your software subscription business</h3>
                    <a class="button lg style2" href="https://lion-coders.com/software/salepro-saas-pos-inventory-saas-php-script">Get SalePro SAAS</a>
                </div>
                <hr>
            @endif
            <div class="d-flex justify-content-between mt-5">
                <div class="footer-links">
                    @foreach($pages as $page)
                    <a href="{{url('page/'.$page->slug)}}">{{$page->title}}</a>
                    @endforeach
                </div>
                <div class="footer-bottom">
                    <p class="copyright">&copy; {{$generalSetting->site_title}} {{date('Y')}}. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer section Ends-->


    <!--Scroll to top starts-->
    <a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
    <!--Scroll to top ends-->

    <div class="body__overlay"></div>

    <!--Plugin js -->
    <script src="{{ asset('landlord/js/plugin.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script src="{{ asset('vendor/jquery/jquery-ui.min.js') }}"></script>

    <!-- Sweetalert2 -->
    {{-- <script src="{{ asset('landlord/js/sweetalert2@11.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main js -->
    <script src="{{ asset('landlord/js/main.js')}}"></script>





    {{-- <script>

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

    @if(!env('USER_VERIFIED'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D0S4KHQ1D6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-D0S4KHQ1D6');
    </script>
    @endif

    @if(!env('USER_VERIFIED'))
        <script>
            $('#light-theme').on('click',function(){
                var css = $('#switch-style').attr('href');
                css = css.replace('dark','light');
                $('#switch-style').attr("href", css);
            })

            $('#dark-theme').on('click',function(){
                var css = $('#switch-style').attr('href');
                css = css.replace('light','dark');
                $('#switch-style').attr("href", css);
            })
        </script>
    @endif

    @stack('scripts')
</body>
</html>

