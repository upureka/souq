<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start @if(Request::route()->getName() == 'admin.home' ){{'active open'}} @endif">
                <a href="{{route('admin.home')}}" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">الرئيسيه</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.settings.map' || Request::route()->getName() == 'admin.settings' || Request::route()->getName() == 'admin.social'){{'active open'}} @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gears"></i>
                    <span class="title">الاعدادات</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.settings'){{'active open'}} @endif">
                        <a href="{{route('admin.settings')}}" class="nav-link ">
                            <i class="fa fa-gear"></i>
                            <span class="title">بيانات الموقع</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.settings.map'){{'active open'}} @endif">
                        <a href="{{route('admin.settings.map')}}" class="nav-link ">
                            <i class="fa fa-map"></i>
                            <span class="title">ادخال الموقع</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.social'){{'active open'}} @endif">
                        <a href="{{route('admin.social')}}" class="nav-link ">
                            <i class="fa fa-feed"></i>
                            <span class="title">التواصل الاجنماعي</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.contact' || Request::route()->getName() == 'admin.about'){{'active open'}} @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">البيانات الثابته</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.contact') {{'active'}} @endif">
                        <a href="{{route('admin.contact')}}">
                            <i class="fa fa-phone"></i>
                            <span class="title">تواصل معنا</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.about') {{'active'}} @endif">
                        <a href="{{route('admin.about')}}">
                            <i class="fa fa-info"></i>
                            <span class="title">من نحن</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.subscribtions.index') {{'active'}} @endif">
                <a href="{{route('admin.subscribtions.index')}}">
                    <i class="fa fa-envelope"></i>
                    <span class="title">الاشتراكات</span>
                </a>
            </li>

            <li class="nav-item start @if(Request::route()->getName() == 'admin.category') {{'active'}} @endif">
                <a href="{{route('admin.category')}}">
                    <i class="fa fa-pie-chart"></i>
                    <span class="title">الاقسام</span>
                </a>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.ads') {{'active'}} @endif">
                <a href="{{route('admin.ads')}}">
                    <i class="fa fa-image"></i>
                    <span class="title">الاعلانات</span>
                </a>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.member') {{'active'}} @endif">
                <a href="{{route('admin.member')}}">
                    <i class="fa fa-users"></i>
                    <span class="title">مستخدمي الموقع</span>
                </a>
            </li>

            <li class="nav-item start @if(Request::route()->getName() == 'admin.package' || Request::route()->getName() == 'admin.chunk'){{'active open'}} @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">الحزم والباقات</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.package') {{'active'}} @endif">
                        <a href="{{route('admin.package')}}">
                            <i class="fa fa-money"></i>
                            <span class="title">الباقات</span>
                        </a>
                    </li>
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.chunk') {{'active'}} @endif">
                        <a href="{{route('admin.chunk')}}">
                            <i class="fa fa-bars"></i>
                            <span class="title">الحزم</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start @if(Request::route()->getName() == 'admin.blogcat' || Request::route()->getName() == 'admin.blog'){{'active open'}} @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">المدونات</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.blogcat'){{'active open'}} @endif">
                        <a href="{{route('admin.blogcat')}}" class="nav-link ">
                            <i class="fa fa-pie-chart"></i>
                            <span class="title">الاقسام</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start @if(Request::route()->getName() == 'admin.blog'){{'active open'}} @endif">
                        <a href="{{route('admin.blog')}}" class="nav-link ">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="title">المدونه</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
