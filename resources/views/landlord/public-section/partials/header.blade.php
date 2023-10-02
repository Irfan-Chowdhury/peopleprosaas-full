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
                        <li><a href="{{url('/')}}#contact">Contact Us</a></li>
                        <li><a href="{{url('/blogs')}}">Blogs</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-5" style="text-align:right">
                <ul class="offset-menu-wrapper p-0 d-none d-lg-flex d-xl-flex">
                    <li class="has-dropdown">
                        <i class="fa fa-globe" aria-hidden="true"></i> {{ Session::has('TempPublicLocale') ? strtoupper(Session::get('TempPublicLocale')) : 'EN'  }}
                        <div class="dropdown">
                            @foreach($languages as $language)
                                <a href="{{ route('lang.switch.byPublic', $language->locale) }}">{{strtoupper($language->locale)}}</a>
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
