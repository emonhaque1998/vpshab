<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon">
  <!--plugins-->
  <link href="{{ asset("admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet"/>
  <link href="{{ asset("admin/assets/plugins/simplebar/css/simplebar.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/plugins/metismenu/css/metisMenu.min.css") }}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset("admin/assets/css/bootstrap.min.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/bootstrap-extended.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/style.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/icons.css") }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


  <!-- loader-->
	<link href="{{ asset("admin/assets/css/pace.min.css") }}" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{ asset("admin/assets/css/dark-theme.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/light-theme.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/semi-dark.css") }}" rel="stylesheet" />
  <link href="{{ asset("admin/assets/css/header-colors.css") }}" rel="stylesheet" />

  <title>{{ config('app.name', 'Laravel') }}</title>


</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
        @include("layouts.navigation")

        @include("layouts.sidebar", ["support" => $support])

       <!--start content-->
          <main class="page-content">
            {{ $slot }}
          </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->


   <!-- Bootstrap bundle JS -->
   <script src="{{ asset("admin/assets/js/bootstrap.bundle.min.js") }}"></script>
   <!--plugins-->
   <script src="{{ asset("admin/assets/js/jquery.min.js") }}"></script>
   <script src="{{ asset("admin/assets/plugins/simplebar/js/simplebar.min.js") }}"></script>
   <script src="{{ asset("admin/assets/plugins/metismenu/js/metisMenu.min.js") }}"></script>
   <script src="{{ asset("admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js") }}"></script>
   <script src="{{ asset("admin/assets/js/pace.min.js") }}"></script>
   <!--app-->
   <script src="{{ asset("admin/assets/js/app.js") }}"></script>
   @stack('scripts')
 </script>


</body>

</html>
