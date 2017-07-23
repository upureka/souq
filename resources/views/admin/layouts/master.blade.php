<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="{{asset('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/admin/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/admin/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/pages/css/profile-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/admin/layouts/layout2/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/layouts/layout2/css/themes/blue-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/admin/layouts/layout2/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />

        <!-- TAGS INPUT -->
        <link href="{{asset('assets/admin/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        @include('admin.layouts.header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            @include('admin.layouts.sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                @yield('content')
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('admin.layouts.footer')
        <!-- END FOOTER -->
        @yield('modals')
        @yield('templates')

        <!-- common edit modal with ajax for all project -->
        <div id="common-modal" class="modal fade" role="dialog">
            <!-- modal -->
        </div>

        <!-- delete with ajax for all project -->
        <div id="delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
            </div>
        </div>
        <script id="template-modal" type="text/html" >
            <div class = "modal-content" >
                <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                <div class = "modal-header" >
                    <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                    <h4 class = "modal-title bold" >مسح العنصر ؟</h4>
                </div>
                <div class = "modal-body" >
                    <p >هل انت متاكد ؟</p>
                </div>
                <div class = "modal-footer" >
                    <a
                        href = "{url}"
                        id = "delete" class = "btn btn-danger" >
                        <li class = "fa fa-trash" > </li> مسح
                    </a>

                    <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                        <li class = "fa fa-times" > </li> الغاء</button >
                </div>
            </div>
        </script>


        @include('admin.templates.loading')
        @include('admin.templates.alerts')
        @include('admin.templates.delete-modal')

        <form action="#" id="csrf">{!! csrf_field() !!}</form>

        <!--[if lt IE 9]>
        <script src="{{asset('assets/admin/global/plugins/respond.min.js')}}"></script>
        <script src="{{asset('assets/admin/global/plugins/excanvas.min.js')}}"></script>
        <script src="{{asset('assets/admin/global/plugins/ie8.fix.min.js')}}"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('assets/admin/map.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9nz9oSfhDxY8if7J66m4ceEXsOoMxNco&callback=init&libraries=places" async defer></script>

        <script src="{{asset('assets/admin/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('assets/admin/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="{{asset('assets/admin/layouts/layout2/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layouts/layout2/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/process.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/sweetalert.min.js')}}" type="text/javascript"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-99643272-3', 'auto');
          ga('send', 'pageview');

        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
