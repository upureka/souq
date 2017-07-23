@extends('admin.layouts.master')
@section('title')
بيانات الموقع
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{route('admin.home')}}">الرئيسيه</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>بيانات الموقع</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gears"></i>تعديل بيانات الموقع</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{route('admin.settings')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="form-body row">
                            <div class="row" style="margin-left: 150px;">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="col-md-3 control-label"> لوجو الموقع</label>
                                    <div class="col-md-9 file-box">
                                        <img src="{{url('storage/uploads/logo/'.$setting->logo)}}" class="img-responsive mr-bot-15 btn-product-image "
                                             style="cursor:pointer; height: 150px; width: 150px;">
                                        <input type="file" style="display:none;" name="logo">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label"> عنوان الموقع</label>
                                <div class="col-md-9 ">
                                    <input type="text" value="{{$setting->site_name}}" class="form-control " name="site_name" placeholder="عنوان الموقع">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label"> البريد الاكتروني</label>
                                <div class="col-md-9">
                                    <input type="email" value="{{$setting->email}}" class="form-control " name="email" placeholder="البريد الالكتروني">
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رقم الهاتف</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->phone}}" class="form-control " name="phone" placeholder="هاتف الشركه">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رقم الواتس اب</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->whats}}" class="form-control " name="whats" placeholder="هاتف الشركه">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط الفيسبوك</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->facebook}}" class="form-control " name="facebook" placeholder="رابط صفحه الموقع علي الفيسبوك">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط تويتر</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->twitter}}" class="form-control " name="twitter" placeholder="رابط صفحه الموقع علي تويتر">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط جوجل بلس</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->google}}" class="form-control " name="google" placeholder="رابط صفحه الموقع علي جوجل بلس">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط قناه يوتيوب</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->youtube}}" class="form-control " name="youtube" placeholder="رابط القناه الخاصه بالموقع علي يوتيوب">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط  لينكد ان</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->linkdin}}" class="form-control " name="linkdin" placeholder="رابط الموقع علي لينكد ان">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">رابط انستجرام</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->instagram}}" class="form-control " name="instagram" placeholder="رابط الموقع علي انستجرام">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">اسم مؤسس الموقع</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->meta_author}}" class="form-control " name="meta_author" placeholder="اسم مؤسس الموقع">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">الكلمات المفتاحيه للموقع</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->meta_keywords}}" class="form-control " name="meta_keywords" placeholder="الكلمات المفتاحيه للبحث عن الموقع">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="col-md-3 control-label">وصف الموقع</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$setting->meta_description}}" class="form-control " name="meta_description" placeholder="وصف الموقع">
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
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn  green btn-lg addBTN">
                                        <i class="fa fa-edit"></i>  تعديل</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
</div>
@endsection