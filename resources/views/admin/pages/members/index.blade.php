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
                        <i class="fa fa-user"></i>  مستخدمي الموقع </div>
                    <div class="caption">
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.member')}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">اسم المستخدم</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="username" placeholder="اسم المستخدم">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">البريد الالكتروني</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="email" class="form-control" name="email" placeholder=" البريد الالكتروني">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">رقم الهاتف</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف">
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">المستخدمين</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>الاسم </th>
                                    <th>البريد الالكتروني </th>
                                    <th>الحاله</th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $user)

                                    <tr style="@if($user->approve == 0) {{'background-color: yellow'}}@elseif($user->approve == -1){{'background-color: red'}}@elseif($user->approve == 1){{'background-color: white'}}@endif">
                                        <td > {{$user->username}} </td>
                                        <td> {{$user->email}} </td>
                                        <td>
                                            <select class="form-control activateBTN" name="type" data-id="{{$user->id}}" data-token="{!! csrf_token() !!}" data-url="{{route('admin.member.condition')}}">
                                                <option value="1" @if($user->approve == 1){{'selected'}}@endif>مفعل</option>
                                                <option value="0" @if($user->approve == 0){{'selected'}}@endif>معلق</option>
                                                <option value="-1" @if($user->approve == -1){{'selected'}}@endif>مغلق</option>
                                            </select>
                                        </td>
                                        <td> {{$user->created_at->diffForHumans()}} </td>
                                        <td>
                                            <a href="members/edit/{{$user->id}}" class="edit-btn btn green">
                                                <li class="fa fa-edit">
                                                    تعديل
                                                </li>
                                            </a>

                                            <a data-url="members/delete/{{$user->id}}" class="btn btn-danger btndelet btn">
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