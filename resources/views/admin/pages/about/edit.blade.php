@extends('admin.layouts.master')
@section('title')
    تعديل بيانات من نحن
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
                    <a href="#">من نحن</a>
                </li>
            </ul>
        </div>

        <div class="row">
            @foreach($about as $detail)
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-info"></i>{{\App\Language::where('code' ,$detail->lang)->value('lang')}}
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="collapse"> </a>
                            </div>
                            <br />
                        </div>

                        <div class="portlet-body form">
                            <form action="{{route('admin.about.edit',['id'=>$detail->id])}}" onsubmit="return false;" method="post" >
                                {!! csrf_field() !!}

                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="col-md-3 control-label">العنوان</label>
                                            <div class="col-md-9 col-sm-6">
                                                <input type="text" class="form-control" value="{{$detail->title}}" name="title" placeholder="العنوان">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="col-md-3 control-label">المحتوي</label>
                                            <div class="col-md-9 col-sm-6">
                                                <textarea class="form-control" name="description" rows="6">{{$detail->content}}</textarea>
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