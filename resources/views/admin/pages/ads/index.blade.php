@extends('admin.layouts.master')
@section('title')
    عرض الاعلانات
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
                    <a href="#">عرض الاعلانات</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="font-dark"></i>
                            <span class="caption-subject bold uppercase">عرض الاعلانات</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>صوره الاعلان</th>
                                    <th>اسم الاعلان</th>
                                    <th>القسم</th>
                                    <th width="250px;">الوصف</th>
                                    <th>الحاله</th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $a)
                                    <tr style="@if($a->approved == 0) {{'background-color: yellow'}}@elseif($a->approved == -1){{'background-color: red'}}@elseif($a->approved == 1){{'background-color: white'}}@endif">

                                        <td>
                                        @if(!empty($a->images()))
                                            <img src="{{asset('storage/uploads/banners/'.$a->images[0]->image)}}" height="250px;" height="250px;">
                                            @else
                                            لم يتم ادخال صور لهذا الاعلان
                                        @endif
                                        </td>
                                        <td> {{$a->translated()->name}} </td>
                                        <td> {{$a->category->translated()->name}} </td>
                                        <td> {{strip_tags(str_limit($a->translated()->desc,50))}} </td>
                                        <td>
                                            <select class="form-control activateBTN" name="type" data-id="{{$a->id}}" data-token="{!! csrf_token() !!}" data-url="{{route('admin.ad.condition')}}">
                                                <option value="1" @if($a->approved == 1){{'selected'}}@endif>مفعل</option>
                                                <option value="0" @if($a->approved == 0){{'selected'}}@endif>معلق</option>
                                                <option value="-1" @if($a->approved == -1){{'selected'}}@endif>مغلق</option>
                                            </select>
                                        </td>
                                        <td> {{$a->created_at->diffForHumans()}} </td>
                                        <td>
                                            <a data-url="ads/delete/{{$a->id}}" class="btn btn-success ">
                                                <li class="fa fa-trash">
                                                    عرض الاعلان
                                                </li>
                                            </a>
                                            <a data-url="ads/delete/{{$a->id}}" class="btn btn-danger btndelet btn">
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