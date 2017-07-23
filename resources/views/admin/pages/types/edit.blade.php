@extends('admin.layouts.master')
@section('title')
    الانواع
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
                    <a href="#">الفئات</a>
                </li>
            </ul>
        </div>

        <div class="row">
            @foreach($type->details as $detail)
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-database"></i>{{\App\Language::where('code' ,$detail->lang)->value('lang')}}</div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.types.edit',['id' => $type->id])}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="lang" value="{{$detail->lang}}">
                            <div class="form-body">
                                <div class="row" style="margin-left: 150px;">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="col-md-3 control-label">الصوره</label>
                                        <div class="col-md-9 file-box">
                                            <img src="{{asset('storage/uploads/types/'.$type->image)}}" class="img-responsive mr-bot-15 btn-product-image "
                                                 style="cursor:pointer; height: 150px; width: 150px;">
                                            <input type="file" style="display:none;" name="image">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الاسم</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" value="{{$detail->name}}" name="name" placeholder="ادخل اسم">
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
                                        <a href="{{route('admin.types',['id'=>$type->category_id])}}" class="btn btn-danger" >
                                            الخلف
                                        </a>
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