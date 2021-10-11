<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <!-- Meta Information -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="cache-control" content="no-store" />
  <meta http-equiv="cache-control" content="must-revalidate" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" /> 
  <meta http-equiv="pragma" content="no-cache" />
  <title>{{ env('APP_FRONT_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{url('/')}}/ninestars-theme/assets/img/favicon.png" rel="icon">
  <link href="{{url('/')}}/ninestars-theme/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{url('/')}}/ninestars-theme/assets/css/style.css" rel="stylesheet">
</head>
<body>
 @yield('content')  
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/aos/aos.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{url('/')}}/ninestars-theme/assets/js/main.js"></script>
</body>
</html>