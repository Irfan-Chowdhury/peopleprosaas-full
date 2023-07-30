<nav class="side-navbar">
    <span class="brand-big">
        {{-- @if($general_setting->site_logo)
        <a href=""><img src="{{url('public/landlord/images/logo', $general_setting->site_logo)}}" width="115"></a>
        @else
        <a href=""><h1 class="d-inline">{{$general_setting->site_title}}</h1></a>
        @endif --}}
    </span>
    <ul id="side-main-menu" class="side-menu list-unstyled">
        <li><a href="#"> <i class="dripicons-meter"></i><span>{{ __('file.dashboard') }}</span></a></li>
        <li><a target="_blank" href=""> <i class="dripicons-monitor"></i><span>Frontend</span></a></li>
        <li><a href="#client" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{trans('file.Client')}}</span><span></a>
            <ul id="client" class="collapse list-unstyled ">
                <li id="client-list-menu"><a href="">{{trans('file.Client List')}}</a></li>
            </ul>
        </li>
        <li><a href=""><i class="dripicons-card"></i> {{trans('file.Payments')}}</a></li>
        <li><a href="#package" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-archive"></i><span>{{trans('file.Package')}}</span><span></a>
            <ul id="package" class="collapse list-unstyled ">
                <li id="package-list-menu"><a href="">{{trans('file.Package List')}}</a></li>
                <li id="package-create-menu"><a href="">{{trans('file.Add Package')}}</a></li>
            </ul>
        </li>
        <li><a href="#cms" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-stack"></i><span>{{trans('file.CMS')}}</span><span></a>
            <ul id="cms" class="collapse list-unstyled ">
                <li id="cms-language-menu"><a href="">{{trans('file.Languages')}}</a></li>
                <li id="cms-hero-menu"><a href="">{{trans('file.Hero Section')}}</a></li>
                <li id="cms-module-menu"><a href="">{{trans('file.Module Section')}}</a></li>
                <li id="cms-feature-menu"><a href="">{{trans('file.Feature Section')}}</a></li>
                <li id="cms-faq-menu"><a href="}">{{trans('file.FAQ Section')}}</a></li>
                <li id="cms-testimonial-menu"><a href="">{{trans('file.Testimonial Section')}}</a></li>
                <li id="cms-tenant-signup-menu"><a href="">{{trans('file.Tenant Signup Description')}}</a></li>
                <li id="cms-blog-menu"><a href="">{{trans('file.Blog Section')}}</a></li>
                <li id="cms-page-menu"><a href="">{{trans('file.Page Section')}}</a></li>
                <li id="cms-social-menu"><a href="">{{trans('file.Social Section')}}</a></li>
            </ul>
        </li>

        <li><a href=""><i class="dripicons-ticket"></i> {{trans('file.Support Tickets')}}</a></li>
        <li><a href=""><i class="dripicons-gear"></i> {{trans('file.settings')}}</a></li>
        <li><a href=""><i class="dripicons-mail"></i> {{trans('file.Mail Setting')}}</a></li>
        {{-- @if(Auth::user()->role_id != 5) --}}
        <li><a target="_blank" href=""> <i class="dripicons-information"></i><span>{{trans('file.Documentation')}}</span></a></li>
        {{-- @endif --}}
    </ul>
  </nav>
