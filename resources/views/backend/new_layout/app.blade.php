<!DOCTYPE html>

<html lang="en" {{Session::get('locale')=='ar'?'direction=rtl dir=rtl style=direction:rtl':''}}>

<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-token" content="">
    @notifyCss
    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{url('/')}}/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet"
        type="text/css"/>

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{url('/')}}/dist/assets/plugins/global/plugins.bundle{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/style.bundle{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{url('/')}}/dist/assets/css/skins/header/base/light{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/header/menu/light{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/brand/dark{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/aside/dark{{Session::get('locale') == 'en' ? '':'.rtl'}}.css" rel="stylesheet" type="text/css"/>
    @stack('css')
    <!--end::Layout Skins -->
<link rel="shortcut icon" href="{{url('/')}}/dist/assets/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-page-loader kt-page-loader--logo">
    <img alt="Logo" src="{{url('/')}}/mujib/images/logo_bottom.png"/>
    <div class="kt-spinner kt-spinner--custom"></div>
</div>
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{url('/admin')}}">
            <img alt="Logo" src="{{url('/')}}/dist/assets/media/Mujib.svg" width="80"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
            id="kt_aside">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="{{url('/admin')}}">
                        <img alt="Logo" src="{{url('/')}}/dist/assets/media/Mujib.svg" width="80"/>
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                                </g>
                            </svg>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"/>
                                    <path
                                        d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
                    data-ktmenu-dropdown-timeout="500">
                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{url('/admin')}}"
                                                                                                class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
													<path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        fill="#000000" opacity="0.3"/>
												</g>
											</svg></span><span class="kt-menu__link-text">{{__('chats.home')}}</span></a></li>
                        <li class="kt-menu__section ">
                            <h4 class="kt-menu__section-text"></h4>
                            <i class="kt-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span
                                    class="kt-menu__link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                        class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path
                                                    d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z"
                                                    fill="#000000"/>
												<path
                                                    d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z"
                                                    fill="#000000" opacity="0.3"/>
										</g>
									</svg></span><span class="kt-menu__link-text">{{__('chats.settings')}}</span><i
                                    class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="{{ route('settings.index') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{__('chats.settings')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if(Auth::user()->is_admin)
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                                data-ktmenu-submenu-toggle="hover">
                                <a href="{{route('users.index')}}"
                                class="kt-menu__link kt-menu__toggle">
                                <span class="kt-menu__link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                </span>
                                    <span class="kt-menu__link-text">{{__('chats.users')}}</span>
                                </a>
                            </li>
                        @endif
                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span
                                    class="kt-menu__link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                        class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"/>
												<path
                                                    d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z"
                                                    fill="#000000"/>
										</g>
									</svg></span><span class="kt-menu__link-text">{{ __('chats.chatbot')}}</span><i
                                    class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="{{route('chats.index')}}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{__('chats.build')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover">
                            <a href="{{route('users.statistics')}}" class="kt-menu__link kt-menu__toggle"><span
                                    class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" opacity="0.3" x="7" y="4" width="3" height="13"
                                                        rx="1.5"/>
													<rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8"
                                                        rx="1.5"/>
													<path
                                                        d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
													<rect fill="#000000" opacity="0.3" x="17" y="11" width="3"
                                                        height="6" rx="1.5"/>
											</g>
										</svg></span><span class="kt-menu__link-text">{{__('chats.statistic')}}</span></a>
                    </ul>
                </div>
            </div>
        </div>

        <!-- end:: Aside Menu -->
    </div>

    <!-- end:: Aside -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper pt-0" 
    id="kt_wrapper" style="min-height: 100vh !important;">

        <!-- begin:: Header -->
        <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed pt-0">
            <!-- begin:: Header Menu -->
            <!-- custom Comment -- this element related to header menu on small screens -->
            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                <!-- <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                    <div id="kt_header_menu"
                        class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default px-4 px-lg-0">
                    </div>
                </div> -->
            </div>
            <!-- end:: Header Menu -->

            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar">
                <!--begin: Language bar -->
                <div class="kt-header__topbar-item kt-header__topbar-item--langs" data-toggle="kt-tooltip"
                    title="Language" data-placement="right">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                        <span class="kt-header__topbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                            fill="#000000" fill-rule="nonzero"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"/>
                                </g>
                            </svg>
                            <!-- <img class="" src="{{url('/')}}/dist/assets/media/flags/226-united-states.svg" alt="" /> -->
                        </span>
                    </div>
                    <div
                        class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                        <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                            <li class="kt-nav__item {{Session::get('locale') == 'en' ? 'kt-nav__item--active':''}}">
                                <a href="{{route('lang','en')}}" class="kt-nav__link">
                                    <span class="kt-nav__link-icon"><img
                                            src="https://cdn1.iconfinder.com/data/icons/rounded-flat-country-flag-collection-1/2000/us-01.png"
                                            alt=""/></span>
                                    <span class="kt-nav__link-text">English</span>
                                </a>
                            </li>
                            <li class="kt-nav__item {{Session::get('locale') == 'ar' ? 'kt-nav__item--active':''}}">
                                <a href="{{route('lang','ar')}}" class="kt-nav__link">
                                    <span class="kt-nav__link-icon"><img
                                            src="https://cdn.countryflags.com/thumbs/saudi-arabia/flag-round-250.png"
                                            alt=""/></span>
                                    <span class="kt-nav__link-text">Arabic</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end: Language bar -->

                <!--begin: User Bar -->
                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                        <div class="kt-header__topbar-user">
                            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                            <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->full_name}}</span>

                            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg 
                            kt-badge--rounded kt-badge--bold">
                                <img alt="Pic" src="{{url('/')}}/dist/assets/media/users/100_3.jpg"/>
                            </span>
                        </div>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right 
                        dropdown-menu-anim dropdown-menu-top-unround">
                        <!--begin: Head -->
                        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x">
                            <div class="kt-user-card__avatar">
                                <span class="kt-badge kt-badge--lg 
                                kt-badge--rounded kt-badge--bold kt-font-success mt-2">
                                    <img alt="Pic" src="{{url('/')}}/dist/assets/media/users/100_3.jpg"/>
                                </span>
                            </div>
                            <div class="kt-user-card__name">{{Auth::user()->full_name}}</div>
                        </div>
                        <!--end: Head -->
                        <!--begin: Navigation -->
                        <div class="kt-notification">
                            <div class="kt-notification__custom kt-space-between">
                                <a href="{{route('logout')}}" class="btn btn-label btn-label-brand btn-sm btn-bold">{{__('chats.Sign_Out')}}</a>
                            </div>
                        </div>
                        <!--end: Navigation -->
                    </div>
                </div>

                <!--end: User Bar -->
            </div>
            <!-- end:: Header Topbar -->
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <!-- Content of Dashboard  -->
            @yield('content')
            <!-- end:: Content -->
            </div>
        </div>
        <!-- begin:: Footer -->
        <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-footer__copyright">
                    2020&nbsp;&copy;&nbsp;<a href="#" class="kt-link">Wakeb</a>
                </div>
                <div class="kt-footer__menu">
                    <a href="#" class="kt-footer__menu-link kt-link">About</a>
                </div>
            </div>
        </div>

        <!-- end:: Footer -->
    </div>
</div>
<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Sticky Toolbar -->
{{--<ul class="kt-sticky-toolbar" style="margin-top: 30px;">--}}
{{--    <!-- <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">--}}
{{--        <a href="#" class=""><i class="flaticon2-drop"></i></a>--}}
{{--    </li> -->--}}
{{--    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand"--}}
{{--        data-toggle="kt-tooltip" title="Settings" data-placement="left">--}}
{{--        <a href="#"><i class="flaticon2-gear"></i></a>--}}
{{--    </li>--}}
{{--    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip"--}}
{{--        title="Documentation" data-placement="left">--}}
{{--        <a href="#"><i class="flaticon2-telegram-logo"></i></a>--}}
{{--    </li>--}}
{{--    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" id="kt_sticky_toolbar_chat_toggler"--}}
{{--        data-toggle="kt-tooltip"--}}
{{--        title="Chat" data-placement="left">--}}
{{--        <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>--}}
{{--    </li>--}}
{{--</ul>--}}

<!-- end::Sticky Toolbar -->

<!-- begin::Demo Panel -->
<div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <h3 class="kt-demo-panel__title">
            Somthing can be here!
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body">

    </div>
</div>

<!-- end::Demo Panel -->

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">
                                <div class="kt-chat__label">
                                    <a href="#" class="kt-chat__title">Jason Muller</a>
                                    <span class="kt-chat__status">
												<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
											</span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Messaging
                                                <i class="flaticon2-information" data-toggle="kt-tooltip"
                                                   data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                    <span class="kt-nav__link-badge">
																<span
                                                                    class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
															</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#"
                                                   data-toggle="kt-tooltip" data-placement="right"
                                                   title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="225">
                            <div class="kt-chat__messages kt-chat__messages--solid">
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/100_12.jpg"
                                                         alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        How likely are you to recommend our company<br> to your friends and family?
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/300_21.jpg"
                                                         alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Hey there, we’re just writing to let you know that you’ve<br> been subscribed to
                                        a repository on GitHub.
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/100_12.jpg"
                                                         alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Ok, Understood!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/300_21.jpg"
                                                         alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You’ll receive notifications for all issues, pull requests!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/100_12.jpg"
                                                         alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You were automatically <b class="kt-font-brand">subscribed</b> <br>because
                                        you’ve been given access to the repository
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/300_21.jpg"
                                                         alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You can unwatch this repository immediately <br>by clicking here: <a href="#"
                                                                                                             class="kt-font-bold kt-link"></a>
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/100_12.jpg"
                                                         alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Discover what students who viewed Learn <br>Figma - UI/UX Design Essential
                                        Training also viewed
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="{{url('/')}}/dist/assets/media/users/300_21.jpg"
                                                         alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Most purchased Business courses during this sale!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea placeholder="Type here..." style="height: 50px"></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#"><i class="flaticon2-link"></i></a>
                                    <a href="#"><i class="flaticon2-photograph"></i></a>
                                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button"
                                            class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">
                                        reply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--ENd:: Chat-->
@include('notify::messages')
@notifyJs
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{url('/')}}/dist/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="{{url('/')}}/dist/assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{url('/')}}/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"
        type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{url('/')}}/dist/assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{url('/')}}/dist/assets/js/pages/dashboard.js" type="text/javascript"></script>
@stack('js')
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
