@extends('admin.layouts.master')
@section('title')
    القسم
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
                            <i class="fa fa-pie-chart"></i>جميع الاقسام</div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.category')}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الاسم باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="ar_name" placeholder="ادخل اسم القسم باللغه العربيه">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الاسم باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="en_name" placeholder="ادخل اسم القسم باللغه الانجليزيه">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <label class="col-md-3 control-label">اختيار القسم الرئيسي</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" name="parent_id">
                                                <option value="0">قسم رئيسي</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->translated()->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <label class="col-md-3 control-label">هل القسم تابع او قسم للسيارات</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" name="isCar">
                                                <option>اختر نوع</option>
                                                <option value="1">نعم</option>
                                                <option value="0">لا</option>
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">الاقسام الرئيسيه</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>الايقونه</th>
                                    <th>الاسم</th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    @if($category->parent_id == 0)
                                    @php
                                        $main = $category->main
                                    @endphp
                                    <tr >
                                        <td><span class="fa {{$category->icon}}"> </span></td>
                                        <td> {{$category->translated()->name}} </td>
                                        <td> {{$category->created_at->diffForHumans()}} </td>
                                        <td>
                                            <a href="types/{{$category->id}}" class="edit-btn btn green">
                                                <li class="fa fa-edit">
    جميع الفئات
                                                </li>
                                            </a>
                                            <a href="category/edit/{{$category->id}}" class="edit-btn btn green">
                                                <li class="fa fa-edit">
                                                    تعديل
                                                </li>
                                            </a>
                                            <a data-id="{{$category->id}}" data-main="{{$category->parent_id}}" class="edit-btn btn green MainCategory" data-url="{{route('admin.category.main')}}" data-token="{!! csrf_token() !!}">
                                                <li class="fa fa-info">
                                                    @if($category->parent_id != 0)
                                                        تحويل الي رئيسي
                                                        @else
تحويل فرعي
                                                    @endif
                                                </li>
                                            </a>
                                            <a data-url="category/delete/{{$category->id}}" class="btn btn-danger btndelet btn">
                                                <li class="fa fa-trash">
                                                    مسح
                                                </li>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">الاقسام الفرعيه</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>الايقونه</th>
                                    <th>الاسم</th>
                                    <th>القسم الرئيسي</th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    @if($category->parent_id != 0)
                                        @php
                                            $main = $category->main
                                        @endphp
                                        <tr >
                                            <td><span class="fa {{$category->icon}}"> </span></td>
                                            <td> {{$category->translated()->name}} </td>
                                            @if($category->parent_id != 0)
                                                <td> {{$main->translated()->name}} </td>
                                            @else
                                                <td>قسم رئيسي</td>
                                            @endif
                                            <td> {{$category->created_at->diffForHumans()}} </td>
                                            <td>
                                                <a href="types/{{$category->id}}" class="edit-btn btn green">
                                                    <li class="fa fa-edit">
                                                        جميع الفئات
                                                    </li>
                                                </a>
                                                <a href="category/edit/{{$category->id}}" class="edit-btn btn green">
                                                    <li class="fa fa-edit">
                                                        تعديل
                                                    </li>
                                                </a>
                                                <a data-id="{{$category->id}}" data-main="{{$category->parent_id}}" class="edit-btn btn green MainCategory" data-url="{{route('admin.category.main')}}" data-token="{!! csrf_token() !!}">
                                                    <li class="fa fa-info">
                                                        @if($category->parent_id != 0)
                                                            تحويل الي رئيسي
                                                        @else
                                                            تحويل فرعي
                                                        @endif
                                                    </li>
                                                </a>
                                                <a data-url="category/delete/{{$category->id}}" class="btn btn-danger btndelet btn">
                                                    <li class="fa fa-trash">
                                                        مسح
                                                    </li>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
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
@section('modals')
    @include('admin.pages.category.model.main')
@endsection