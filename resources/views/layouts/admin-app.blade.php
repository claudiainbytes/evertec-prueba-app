<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="cache-control" content="must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <title>{{ env('APP_NAME') }}</title>
    <!-- CSS -->
    <link href="{{url('/')}}/sb-vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/sb-vendors/css/webfont-nunito.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{url('/')}}/sb-vendors/css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        window.basepath_project="{{url('/')}}";
        window.myApp = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!};
    </script>  
</head>
<body class="bg-gradient-primary">
    @yield('content')
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('/')}}/sb-vendors/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/sb-vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/sb-vendors/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{url('/')}}/sb-vendors/js/sb-admin-2.min.js"></script>
    <script src="{{url('/')}}/js/registro.js?1.0.0"></script>
</body>
</html>