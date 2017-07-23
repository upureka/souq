<header class="header">
    <div class="container">
        <a href="{{route('site.home')}}" class="logo">
            <img src="{{asset('assets/site/images/logo.png')}}">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </button>
        <div class="top-navbar">
            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="messages.html" class="active">
                            <i class="fa fa-envelope"></i>
                            الرسائل
                        </a>
                    </li>
                    @if(!auth()->guard('members')->check())

                        <li>
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
                    @else
                        <li>
                            <a href="{{route('site.logout')}}">
                                <i class="fa fa-key"></i>
                                تسجيل خروج
                            </a>
                        </li>
                    @endif
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