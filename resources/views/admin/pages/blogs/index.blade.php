@extends('admin.layouts.master')
@section('title')
    المقالات
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
                    <a href="#"> المقالات</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-newspaper-o"></i> المقالات</div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                        <br />
                    </div>

                    <div class="portlet-body form">
                        <form action="{{route('admin.blog')}}" onsubmit="return false;" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-body">
                                <div class="row" style="margin-left: 150px;">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="col-md-3 control-label">الصوره</label>
                                        <div class="col-md-9 file-box">
                                            <img src="http://knowledge-commons.com/static/assets/images/avatar.png" class="img-responsive mr-bot-15 btn-product-image "
                                                 style="cursor:pointer; height: 150px; width: 150px;">
                                            <input type="file" style="display:none;" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">العنوان باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="ar_title" placeholder="ادخل العنوان باللغه العربيه">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">العنوان باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" name="en_title" placeholder="ادخل العنوان باللغه الانجليزيه">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">المحتوي باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <textarea class="form-control tiny-editor" placeholder="ادخل المحتوي باللغه العربيه"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">المحتوي باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <textarea class="form-control tiny-editor" placeholder="ادخل المحتوي باللغه الانجليزيه"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">القسم التابع له المدونه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" name="category_id">
                                                @foreach($blogcategories as $category)
                                                    <option value="{{$category->id}}">
                                                        @if(app()->getLocale() == 'ar')
                                                            {{$category->ar_name}}
                                                            @else
                                                            {{$category->en_name}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الكلمات المفتاحيه باللغه العربيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" data-role="tagsinput" name="ar_tags" placeholder="الكلمات المفتاحيه باللغه العربيه">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-md-3 control-label">الكلمات المفتاحيه باللغه الانجليزيه</label>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="text" class="form-control" data-role="tagsinput" name="en_tags" placeholder="الكلمات المفتاحيه باللغه الانجليزيه">
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
                            <span class="caption-subject bold uppercase">المقالات</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped table-responsive text-center">
                                <thead>
                                <tr >
                                    <th>العنوان </th>
                                    <th>المحتوي </th>
                                    <th>انشئ في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr >
                                        <td> {{$blog->getTitle()}} </td>
                                        <td> {{strip_tags(str_limit($blog->getDesc() ,50 ))}} </td>
                                        <td> {{$blog->created_at->diffForHumans()}} </td>
                                        <td>
                                            <a href="blogs/edit/{{$blog->id}}" class="edit-btn btn green">
                                                <li class="fa fa-edit">
                                                    تعديل
                                                </li>
                                            </a>
                                            <a data-url="blogs/delete/{{$blog->id}}" class="btn btn-danger btndelet btn">
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