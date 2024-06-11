<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="INEBUR is owner of Antler">
    <link href="assets/img/favicon.ico" rel="shortcut icon">
    <title>Antler - Hosting Provider & WHMCS Template</title>
    <!-- Font Style -->
    <link href="{{ asset("assets/fonts/fontawesome/css/all.min.css") }}" rel='stylesheet'>
    <link href="{{ asset("assets/fonts/fonts.min.css") }}"  rel='stylesheet'>
    <!-- RTL Style -->
    <link type="text/css" href="{{ asset("assets/css/rtl/bootstrap-rtl.min.css") }}" rel='stylesheet' class="rtl" disabled>
    <link type="text/css" href="{{ asset("assets/css/rtl/theme-rtl.min.css") }}" rel='stylesheet' class="rtl" disabled>
    <!-- CSS Style -->
    <link type="text/css" href="{{ asset("assets/css/bootstrap.min.css") }}" rel='stylesheet' class="ltr">
    <link type="text/css" href="{{ asset("assets/css/aos.min.css") }}" rel='stylesheet' class="ltr">
    <link type="text/css" href="{{ asset("assets/css/vendors.min.css") }}" rel='stylesheet'>
    <link type="text/css" href="{{ asset("assets/css/theme.min.css") }}" rel='stylesheet'>
</head>
    <body >
        <div class="box-container limit-width">

            <!-- ***** LOADING PAGE ****** -->
            <div id="spinner-area">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                    <div class="spinner-txt">Antler...</div>
                </div>
            </div>
        <!-- ***** 404 ****** -->
            {{ $slot }}
    </div>
<!-- Javascript -->
    <script type="text/javascript" src="{{ asset("assets/js/jquery.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/gdpr-cookie.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/popper.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/slick.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/aos.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/swiper.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/jquery.lazyload-any.min.js") }}"></script>
    <script defer type="text/javascript" src="{{ asset("assets/js/scripts.min.js") }}"></script>
</body>
</html>
