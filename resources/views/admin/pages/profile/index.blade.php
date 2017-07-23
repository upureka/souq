@extends('admin.layouts.master')
@section('title')
{{auth()->guard('admins')->user()->username}}
@endsection
@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <form role="form" action="{{route('admin.profile')}}" enctype="multipart/form-data" onsubmit="return false;">
            {!! csrf_field() !!}
            <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic file-box">
                        <img src="{{url('storage/uploads/users/'.auth()->guard('admins')->user()->image)}}" class="mr-bot-15  img-responsive btn-product-image" alt="">
                        <input type="file" style="display:none;" name="image">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{auth()->guard('admins')->user()->name}} </div>
                        <div class="profile-usertitle-job"> {{auth()->guard('admins')->user()->address}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="javascript:;">
                                    <i class="icon-settings"></i> بيانات الحساب</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <div>
                        <h4 class="profile-desc-title">عن {{auth()->guard('admins')->user()->name}}</h4>
                        <span class="profile-desc-text"> {{auth()->guard('admins')->user()->about}} </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="{{auth()->guard('admins')->user()->facebook}}">{{auth()->guard('admins')->user()->facebook}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="{{auth()->guard('admins')->user()->twitter}}">{{auth()->guard('admins')->user()->name}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-google"></i>
                            <a href="{{auth()->guard('admins')->user()->google}}">{{auth()->guard('admins')->user()->name}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-linkedin"></i>
                            <a href="{{auth()->guard('admins')->user()->linkdin}}">{{auth()->guard('admins')->user()->linkdin}}</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">بيانات الحساب</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">المعلومات الشخصيه</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">

                                        <div class="form-group">
                                            <label class="control-label">الاسم</label>
                                            <input type="text" placeholder="John" name="name" value="{{$user->name}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                                <label class="control-label">اسم المستخدم</label>
                                                <input type="text" placeholder="Doe" name="username" value="{{$user->username}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">رقم الهاتف</label>
                                            <input type="text" placeholder="+1 646 580 DEMO (6284)" name="phone" value="{{$user->phone}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">البريد الالكتروني</label>
                                            <input type="email" placeholder="hello@example.com" name="email" value="{{$user->email}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">العنوان</label>
                                            <input type="text" placeholder="كفر الزيات" name="address" value="{{$user->address}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">عن المستخدم</label>
                                            <textarea class="form-control" rows="3" name="about" placeholder="We are KeenThemes!!!">{{$user->about}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">الفيسبوك</label>
                                            <input type="text" placeholder="https://www.facebook.com/" name="facebook" value="{{$user->facebook}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">تويتر</label>
                                            <input type="text" placeholder="https://www.twitter.com/" name="twitter" value="{{$user->twitter}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">لينكد ان</label>
                                            <input type="text" placeholder="https://www.linkdin.com/" name="linkdin" value="{{$user->linkdin}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">يوتيوب</label>
                                            <input type="text" placeholder="https://www.youtube.com/" name="youtube" value="{{$user->youtube}}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">الرقم السري</label>
                                            <input type="password" name="password" class="form-control" />
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped " role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only"></span>
                                            </div>
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="submit" class="btn  green btn-lg addBTN">
                                                <i class="fa fa-edit"></i>  تعديل</button>
                                        </div>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
        </form>
    </div>
</div>
@endsection