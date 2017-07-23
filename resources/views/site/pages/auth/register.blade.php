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
    <title>اعلانات مبوبه</title>

    <!-- Favicon
    ===========================-->



    <!-- Web Fonts
    ========================== -->


    <!-- Base & Vendors
    ========================== -->
    <link href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/site/vendor/fonts/icommon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/vendor/fonts/fonts-subacate/style.css')}}">
    <!-- Site Style
    ========================== -->
    <!--        <link rel="stylesheet" href="css/style.css">-->
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
    <header class="header">
        <div class="container">
            <a href="index.html" class="logo">
                <img src="{{asset('assets/site/images/logo.png')}}">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <div class="top-navbar">
                <nav class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="messages.html" class="active">
                                <i class="fa fa-envelope"></i>
                                الرسائل
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{route('site.login')}}">
                                <i class="fa fa-unlock-alt"></i>
                                دخول
                            </a>
                        </li>
                        <li>
                            <a href="{{route('site.register')}}">
                                <i class="fa fa-user-plus"></i>
                                تسجيل
                            </a>
                        </li>
                        <li>
                            <a href="add-new.html" class="custom-btn btn-add">
                                <i class="fa fa-plus"></i>
                                أضف إعلان جديد
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!--End top-navbar-->
        </div><!-- End container-->
    </header><!-- End Header -->

    <div class="main">
        <div class="page-head">
            <div class="page-head-img">
                <img src="{{asset('assets/site/images/bg-head.png')}}">
            </div><!-- End home-slider-Img -->
            <div class="container">
                <div class="page-head-content">
                    <div class="page-title">
                        <h3 class="title">
                            تسجيل عضويه جديده
                        </h3>
                    </div><!--End Page-head-title-->

                    <nav class="breadcrumbs-box">
                        <ol class="breadcrumb">
                            <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                            <li class="active">تسجيل عضويه جديده</li>
                        </ol>
                    </nav><!--End breadcrumbs-box-->
                </div><!--End page-head-content-->
            </div><!-- End  Container-->
        </div><!--End page-head-->
        <div class="page-content">
            <section class="section-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="section-head">
                                <div class="section-head-img">
                                    <img src="{{asset('assets/site/images/logo.png')}}">
                                </div><!--End section-head-img-->
                            </div><!--End section-head-->
                            <div class="box-item">
                                <div class="alert alert-success hidden " id="success"></div>
                                <div class="alert alert-danger hidden " id="error"></div>
                                <h3 class="title title-md">تسجيل الدخول</h3>
                                <form class="sign-form register-ajax" action="{{route('site.register')}}" method="post" onsubmit="false">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input class="form-control" name="username" placeholder="اسم المستخدم " type="text">
                                    </div><!--End form-group-->
                                    <div class="form-group">
                                        <input class="form-control" name="email" placeholder=" البريد الالكترونى" type="email">
                                    </div><!--End form-group-->
                                    <div class="form-group">
                                        <input class="form-control" name="phone" placeholder=" رقم الهاتف " type="text">
                                    </div><!--End form-group-->
                                    <div class="form-group">
                                        <input class="form-control" name="password" placeholder="كلمة المرور" type="password">
                                    </div><!--End form-group-->
                                    <div class="form-group">
                                        <div class="reset-new-user">
                                            <a href="{{route('site.login')}}" class="pull-right">
                                                تسجيل دخول ؟
                                            </a>
                                        </div><!--End reset-new-user-->
                                    </div><!--End form-group-->
                                    <button class="custom-btn btn-block">تسجيل الدخول</button>
                                </form><!-- End Form -->
                            </div><!-- End Sign-Form -->
                        </div><!--End col-md-6-->
                    </div><!--End row-->
                </div><!-- End container -->
            </section><!-- End-->
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title has-before">من نحن</h3>
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <p>
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                </p>
                                <ul class="contact-list">
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <p>الهاتف : 024342 900 0106 02</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <p>20 شارع المعز - القاهرة - مصر</p>
                                    </li>
                                </ul><!--End social-list-->
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title has-before">روابط سريعة</h3>
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <ul class="important-links list-second">
                                    <li>
                                        <a href="#">الاعلان فى الموقع </a>
                                    </li>
                                    <li>
                                        <a href="#">الاعلان فى الموقع </a>
                                    </li>
                                    <li>
                                        <a href="#">شروط الاستخدام</a>
                                    </li>
                                    <li>
                                        <a href="#">شروط الاستخدام</a>
                                    </li>
                                    <li>
                                        <a href="#">سياسة الخصوصية</a>
                                    </li>
                                    <li>
                                        <a href="#">سياسة الخصوصية</a>
                                    </li>
                                    <li>
                                        <a href="#">مساعدة</a>
                                    </li>
                                    <li>
                                        <a href="#">مساعدة</a>
                                    </li>
                                    <li>
                                        <a href="#">سؤال وجواب</a>
                                    </li>
                                    <li>
                                        <a href="#">سؤال و جواب</a>
                                    </li>
                                </ul><!--End important-links-->
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title has-before">ابق على تواصل معنا</h3>
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <form class="subscribe-form">
                                    <input class="form-control" placeholder="ادخل بريدك الالكتروني" type="email">
                                    <button class="custom-btn">اشترك</button>
                                </form><!--End subscribe-form-->
                                <ul class="social-list">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4-->
                </div><!--End row-->
            </div><!--End container-->
        </footer>
        <div class="footer-copyright">
            <p>جميع الحقوق محفوظة لموقع اعلانات مبوبه © </p>
        </div><!-- End Copy-Right -->

    </div><!-- End Main -->
</div><!-- End Wrapper -->

<!-- JS Base & Vendors
==========================-->
<script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/admin/jquery.validate.js')}}"></script>
<script src="{{asset('assets/site/js/site.js')}}"></script>

<!-- Site JS
==========================-->
<script src="{{asset('assets/site/js/main.js')}}"></script>

</body>
</html>