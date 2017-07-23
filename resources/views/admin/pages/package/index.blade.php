@extends('admin.layouts.master')
@section('title')
    تجديد الباقات
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
                    <a href="#">الباقات</a>
                </li>
            </ul>
        </div>
        <div class="row">
            @foreach($packages as $package)
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">{{$package->translated()->name}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="{{route('admin.package')}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$package->id}}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الاسم باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->details()->where('lang' ,'ar')->value('name')}}" name="ar_name" placeholder="ادخل اسم القسم باللغه العربيه">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الاسم باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->details()->where('lang' ,'en')->value('name')}}" name="en_name" placeholder="ادخل اسم القسم باللغه الانجليزيه">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">السعر الشهري</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->monthly}}" name="monthly">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">السعر الربع سنوي</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->quarter}}" name="quarter">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">السعر السنوي</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->fullYear}}" name="fullYear">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label"> عدد الاعلانات المتاحه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$package->amount}}" name="amount">
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