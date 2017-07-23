@extends('site.layouts.master')
@section('title')
{{$category->translated()->name}}
@endsection
@section('content')
    <div class="page-head">
        <div class="page-head-img">
            <img src="{{asset('assets/site/images/bg-head.png')}}">
        </div><!-- End home-slider-Img -->
        <div class="container">
            <div class="page-head-content">
                <div class="page-title">
                    <h3 class="title">
                        {{$category->translated()->name}}
                    </h3>
                </div><!--End Page-head-title-->
                <div class="search-tabs">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group has-left-icon">
                                    <input class="form-control" type="text" placeholder=" عن ماذا تبحث ؟">
                                    <i class="fa fa-search"></i>
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control crs-country">
                                        <option disabled="" selected="">
                                            جميع المدن
                                        </option>
                                    </select>
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option disabled="" selected="">
                                            جميع الفئات
                                        </option>
                                        @foreach($categories as $singleCat)
                                            @if($singleCat->parent_id == 0)
                                                <option>{{$singleCat->translated()->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-1">
                                <button class="custom-btn btn-block" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div><!-- End col -->
                        </div><!-- End row -->
                    </form><!-- End Form -->
                </div><!-- End Search-Tabs -->
                <nav class="breadcrumbs-box">
                    <ol class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        @if($category->parent_id == 0)
                            <li class="active"> {{$category->translated()->name}}</li>
                            @else
                            <li><a href="{{route('site.category',['slug' => $category->main['slug']])}}">{{$category->main->translated()->name}}</a> </li>
                            <li class="active">{{$category->translated()->name}}</li>
                        @endif
                    </ol>
                </nav><!--End breadcrumbs-box-->
            </div><!--End page-head-content-->
        </div><!-- End  Container-->
    </div><!--End page-head-->

    <div class="page-content">
        <section class="section-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="side-accordion">
                            <div class="side-accordion-head">
                                أقسام الموقع
                            </div><!--End Accordion-head-->
                            <div class="accordion-container" id="items">
                                @foreach($categories as $singleCat)
                                    @if($singleCat->parent_id == 0)
                                        <div class="panel">
                                            <a href="#service{{$singleCat->id}}" data-toggle="collapse" data-parent="#items" class="">
                                                {{$singleCat->translated()->name}}
                                            </a>
                                            <div class="panel-collapse collapse @if($singleCat->slug == $category->slug){{'in'}}@endif" id="service{{$singleCat->id}}">
                                                <div class="panel-content">
                                                    <ul class="panel-content-links">
                                                        @foreach($singleCat->sub as $subCat)
                                                        <li>
                                                            <a href="{{route('site.category',['slug' => $subCat->slug])}}">
                                                                {{$subCat->translated()->name}}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div><!-- end content -->
                                            </div><!--End panel-collapse-->
                                        </div><!--End Panel-->
                                    @endif
                                @endforeach
                            </div><!--End toggle-container-->
                        </div><!--End Side-accordion-->
                    </div><!-- End col -->

                    <div class="col-md-9">
                        <div class="head-box">
                            <div class="head-box-title">
                                إعلانات مضافة حديثا
                            </div>
                            <div class="head-box-icons toggle-items" data-container="#layout-wrap">
                                <a href="" class="active" data-layout="list_view"  title="list view">
                                    <i class="fa fa-list-ul"></i>
                                </a>
                                <a href="" data-layout="grid_view" title="grid view">
                                    <i class="fa fa-th"></i>
                                </a>
                            </div>
                        </div><!--End Head-box-->
                        <div id="layout-wrap" class="layouts">
                            <div class="row">
                                @foreach($ads as $ad)
                                <div class="col-md-12">
                                    <div class="cat-item">
                                        <div class="cat-item-head">
                                            <div class="cat-item-img">
                                                @if(!empty($ad->images()))
                                                    <img src="{{asset('storage/uploads/banners/'.$ad->images[0]->image)}}">
                                                    @else
                                                    <img src="http://knowledge-commons.com/static/assets/images/avatar.png">
                                                @endif
                                            </div><!--End cat-item-itmg-->
                                        </div><!-- End cat-item-head -->
                                        <div class="cat-item-content">
                                            <div class="title-price">
                                                <a href="#">
                                                    <h3 class="title">{{$ad->translated()->name}}</h3>
                                                </a>
                                                <span class="price">{{$ad->price}} ر.س</span>
                                            </div><!-- End Title-Price -->
                                            <div class="cat-item-info">
                                                <div class="cat-item-map">
                                                    <i class="fa fa-map-marker"></i>
                                                    الرياض
                                                </div><!-- End cat-item-map -->
                                                <div class="cat-item-auth">
                                                    <i class="fa fa-user-o"></i>
                                                    {{$ad->member['username']}}
                                                </div><!--End cat-item--date-->
                                                <div class="cat-item-date">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{$ad->created_at->diffForHumans()}}
                                                </div><!--End cat-item--date-->
                                            </div><!--End map-date-->
                                            <div class="action-image-wrapper">
                                                <div class="cat-item-action">
                                                    <button class="item-btns WishlistBTN" type="submit" title="أضف إلى المفضلة" data-url="{{route('site.wishlist')}}" data-id="{{$ad->id}}">
                                                        <i class="fa fa-heart"></i>
                                                        <span class="button-text">
                                                        @if(sizeof(\App\Wishlist::where('ad_id', $ad->id)->where('member_id' ,auth()->guard('members')->user()->id)->value('id')) > 0)
                                                                        حذف من المفضله
                                                            @else
                                                                        اضافه للمفضله
                                                        @endif
                                                        </span>
                                                    </button>
                                                    <button class="item-btns" title="إتصال">
                                                        <i class="fa fa-phone"></i>
                                                        <span>إتصل</span>
                                                    </button>
                                                    <button class="item-btns" title="دردش">
                                                        <i class="fa fa-comments"></i>
                                                        <span>دردش</span>
                                                    </button>
                                                </div><!-- End cat-item-Option -->
                                                <div class="owner-img">
                                                    @if(!empty($ad->member['avatar']))
                                                        <img src="{{asset('storage/uploads/members/'.$ad->member['avatar'])}}">
                                                    @else
                                                        <img src="http://knowledge-commons.com/static/assets/images/avatar.png">
                                                    @endif
                                                </div><!-- End cat-item-Owner-Img -->
                                            </div><!--End Action-image-wrapper-->
                                        </div><!-- End cat-item-Content -->
                                    </div><!-- End cat-item -->
                                </div><!--End col-md-12-->
                                @endforeach
                            </div><!--End Row-->
                        </div><!--End Layout-->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!--End page-content-->
@endsection