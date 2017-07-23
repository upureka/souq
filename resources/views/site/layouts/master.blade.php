<!DOCTYPE html>
<html>
    <head>
    <!-- Meta Tags
    ========================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site Title
    ========================== -->
    <title>{{$settings->site_name}} | @yield('title')</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fave.png')}}">
    <!-- Base & Vendors
    ========================== -->
    <link href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/magnific-popup/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/fonts/icommon/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- Site Style
    ========================== -->

    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/test.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/open-2.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <!-- BEGIN HEADER -->
                @include('site.layouts.header')
            <!-- END HEADER -->
            <div class="main">
                <!-- BEGIN CONTENT -->
                    @yield('content')
                <!-- END CONTENT -->
                <!-- BEGIN FOOTER -->
                @include('site.layouts.footer')
                <!-- END FOOTER -->
            </div>
        </div><!-- End Wrapper -->

        <!-- JS Base & Vendors
        ========================== -->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/magnific-popup/js/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/site/vendor/country/dist/crs.min.js')}}"></script>
        <script src="{{ asset('assets/site/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js') }}"></script>
        <!-- Site JS
        ========================== -->
        <script src="{{asset('assets/admin/jquery.validate.js')}}"></script>
        <script src="{{asset('assets/site/js/site.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>

    </body>
</html>