@extends('admin.layouts.master')
@section('title')
    الحزم
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
                    <a href="#">الحزم</a>
                </li>
            </ul>
        </div>
        <div class="row">
            @foreach($chunks as $chunk)
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="font-dark"></i>
                                <span class="caption-subject bold uppercase">الحزمه {{$chunk->id}}</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="{{route('admin.chunk')}}" onsubmit="return false;" method="post" >
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$chunk->id}}">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="col-md-3 control-label">عدد الاعلانات في تلك الحزمه</label>
                                            <div class="col-md-9 col-sm-6">
                                                <input type="text" class="form-control" value="{{$chunk->numberOfAds}}" name="numberOfAds">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="col-md-3 control-label">عدد الايام</label>
                                            <div class="col-md-9 col-sm-6">
                                                <input type="text" class="form-control" value="{{$chunk->numberOfDays}}" name="numberOfDays">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="col-md-3 control-label">الخصم الخاص بالحزمه (اذا وجد)</label>
                                            <div class="col-md-9 col-sm-6">
                                                <input type="text" class="form-control" value="{{$chunk->sale}}" name="sale">
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
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            @endforeach
        </div>
    </div>
@endsection