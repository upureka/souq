@extends('admin.layouts.master')
@section('title')
    بيانات تواصل معنا
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
                    <a href="#">تعديل التواصل معنا</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-info"></i>تعديل التواصل معنا </div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.contact.edit',['id' => $data->id])}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-md-3 control-label">العنوان</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-md-3 control-label">المحتوي</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control" value="{{$data->value}}" name="value" placeholder="Enter Content">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 ">
                                    <label class="col-md-3 control-label">الايقونه</label>
                                    <div class="col-md-9 col-sm-6">
                                        <select class="form-control fa" name="icon">
                                            @foreach($icons as $key => $val)
                                                <option value="{{$key}}" @if($data->icon == $key){{'selected'}}@endif>{{$val}}</option>
                                            @endforeach
                                        </select>
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
                                    <div class="text-center ">
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