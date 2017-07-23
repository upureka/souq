@extends('admin.layouts.master')
@section('title')
اضافه الموقع عالخريطه
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
                <span>اضافه الموقع من علي الخريطه</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-map"></i>اضافه الموقع من علي الخريطه</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{route('admin.settings.map')}}" method="POST" enctype="multipart/form-data" class="form-horizontal mapinfo" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="form-body row">
                            <div class="form-group col-sm-6 col-md-6" id="sizing-addon1">
                                <label class="col-md-3 control-label">خط الطول</label>
                                <div class="col-md-9">
                                    <input type="text" id="lng" name="long" class="form-control" value="{{ $setting->long }}" aria-describedby="sizing-addon1">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6" id="sizing-addon2">
                                <label class="col-md-3 control-label">خط العرض</label>
                                <div class="col-md-9">
                                    <input type="text" id="lat" name="lat" class="form-control" value="{{ $setting->lat }}" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            <input type="hidden" name="address" id="location">
                            <div class="form-group col-sm-6 col-md-6">

                                <div class="col-md-9">
                                    <input type="text" id="loc"class="form-control" placeholder="المكان علي الخريطه" value="{{ $setting->address }}" aria-describedby="sizing-addon3">
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped " role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn  green btn-lg addBTN">
                                        <i class="fa fa-edit"></i>  ادخال</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-map"></i>الخريطه</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->

                <div class="portlet-body form">
                    <div class="form-body row">
                        <div id="map-canvas" style="height: 350px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection