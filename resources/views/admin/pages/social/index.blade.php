@extends('admin.layouts.master')
@section('title')
    بيانات مواقع التواصل الاجتماعي
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
                    <a href="#">بيانات مواقع التواصل الاجتماعي</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-feed"></i>بيانات مواقع التواصل الاجتماعي</div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.social.add')}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-md-3 control-label">اللينك</label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="text" class="form-control" name="link" placeholder="example:https://www.facebook.com/">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 ">
                                    <label class="col-md-3 control-label">الايقونه</label>
                                    <div class="col-md-9 col-sm-6">
                                        <select class="form-control fa" name="icon">
                                            @foreach($icons as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">بيانات مواقع التواصل الاجتماعي</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>الايقونه</th>
                                    <th>العنوان</th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($links as $link)
                                    <tr >
                                        <td><span class="fa {{$link->icon}}"> </span></td>
                                        <td> {{$link->link}} </td>
                                        <td> {{$link->created_at->diffForHumans()}} </td>
                                        <td>
                                            <a href="social-links/edit/{{$link->id}}" class="edit-btn btn green">
                                                <li class="fa fa-edit">
                                                    تعديل
                                                </li>
                                            </a>
                                            <a data-url="social-links/delete/{{$link->id}}" class="btn btn-danger btndelet btn">
                                                <li class="fa fa-trash">
                                                    مسح
                                                </li>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
@endsection