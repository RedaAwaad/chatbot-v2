<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Chatbot | Login Page</title>
    <meta name="description" content="Login page">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{url('/')}}/dist/assets/css/pages/login/login-5.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{url('/')}}/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{url('/')}}/dist/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('/')}}/dist/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{url('/')}}/mujib/images/logo_bottom.png"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
        <div
            class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile"
            style="background-image: url({{url('/')}}/dist/assets/media/bg/bg-3.jpg);">
        <div class="kt-login__left">
            <div class="kt-login__wrapper">
                <div class="kt-login__content">
                    <a class="kt-login__logo" href="#">
                        <img src="{{url('/')}}/mujib/images/logo_bottom.png" style="width: 150px">
                    </a>
                    <h3 class="kt-login__title">JOIN OUR GREAT COMMUNITY</h3>
                    <span class="kt-login__desc">
									Wakeb Chatbot
								</span>
                    <div class="kt-login__actions">
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-login__divider">
            <div></div>
        </div>
        <div class="kt-login__right">
            <div class="kt-login__wrapper">
                <div class="kt-login__signin">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Login To Your Account</h3>
                    </div>
                    <div class="kt-login__form">
                        <form class="kt-form" method="POST" action="{{route("login")}}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" name="email"
                                       autocomplete="on">

                            </div>
                            @error('email')
                            <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group">
                                <input class="form-control form-control-last" type="Password" placeholder="Password"
                                       name="password">
                                @error('password')
                                <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                                <button type="submit" class="btn btn-brand btn-pill btn-elevate">Sign In
                                </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- end:: Page -->

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

<!--begin::Page Scripts(used by this page) -->
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
