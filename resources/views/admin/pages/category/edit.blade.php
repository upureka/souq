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
            @foreach($category->details as $detail)
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pie-chart"></i>{{\App\Language::where('code' ,$detail->lang)->value('lang')}}
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.category.edit',['id'=>$category->id])}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="lang" value="{{$detail->lang}}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">اسم القسم</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$detail->name}}" name="name" placeholder="اسم القسم">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <label class="col-md-3 control-label">الايقونه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control fa" name="icon">
                                                @foreach($icons as $key => $val)
                                                    <option value="{{$key}}" @if($category->icon == $key){{'selected'}}@endif>{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <label class="col-md-3 control-label">اختيار القسم الرئيسي</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" name="parent_id">
                                                <option value="0" @if($category->parent_id == '0'){{'selected'}}@endif>قسم رئيسي</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" @if($category->parent_id == $cat->id){{'selected'}}@endif>{{$cat->translated()->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <label class="col-md-3 control-label">هل القسم تابع او قسم للسيارات</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" name="isCar">
                                                <option value="1" @if($category->isCar == '1'){{'selected'}}@endif>نعم</option>
                                                <option value="0" @if($category->isCar == '0'){{'selected'}}@endif>لا</option>
                                            </select>
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
                @endforeach
        </div>
    </div>
@endsection