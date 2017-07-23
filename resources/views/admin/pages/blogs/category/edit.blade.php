@extends('admin.layouts.master')
@section('title')
    تعديل القسم
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
                    <a href="#">الاقسام</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pie-chart"></i>{{$category->ar_name}}
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.blogcat.edit',['id'=>$category->id])}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}

                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">اسم القسم باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$category->en_name}}" name="en_name" placeholder="اسم القسم باللغه الانجليزيه">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">اسم القسم باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$category->ar_name}}" name="ar_name" placeholder="اسم القسم باللغه العربيه">
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