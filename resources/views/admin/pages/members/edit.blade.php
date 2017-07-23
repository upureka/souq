@extends('admin.layouts.master')
@section('title')
    مستخدمي الموقع
@endsection
@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{url('/')}}">الرئيسيه</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <li>
                    <a href="#"> مستخدمي الموقع</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <i class="fa fa-user"></i>تعديل اليانات</div>
                    <div class="caption">
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.member.edit',['id'=>$member->id])}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">اسم المستخدم</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$member->username}}" name="username" placeholder="اسم المستخدم">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">البريد الالكتروني</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="email" class="form-control" value="{{$member->email}}" name="email" placeholder=" البريد الالكتروني">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">رقم الهاتف</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$member->phone}}" name="phone" placeholder="رقم الهاتف">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الرقم السري</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="password" class="form-control" name="password" placeholder="الرقم السري">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped " role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="text-center">
                                        <button type="submit" class="btn green addBTN">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--End portlet-->
                </div>
            </div>
        </div>
    </div>
@endsection