@extends('site.layouts.master')
@section('title')
    الصفحه الرئيسيه
@endsection
@section('content')
    <div class="home-slider">
        <div class="home-slider-img">
            <img src="{{asset('assets/site/images/bg-head.png')}}">
        </div><!-- End home-slider-Img -->
        <div class="container">
            <div class="home-slider-head">
                <h3 class="title title-lg">
                    أول موقع ديال الاعلانات المجانية فى المغرب
                </h3><!--End title-->
                <p>
                    موقع اعلانات يضم اكثر من 1,200,000 اعلان
                </p>
            </div><!-- End Home-Slider-Head -->
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
                                        جميع الدول
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
                                    @foreach ($categories as $category)
                                        @if($category->parent_id == 0)
                                            <option value="{{$category->id}}">{{$category->translated()->name}}</option>
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
        </div><!-- End container -->
    </div>
    <div class="page-content">
        <section class="welcom-section">
            <div class="container">
                <div class="welcom-head">
                    <h2>
                        مرحبا بكم فى سوق <span>السعودية المفتوح</span>
                    </h2>
                    <h3>
                        أضف إعلان مجانا وبدون عمولة
                    </h3>
                </div><!--End Welcom-head-->
                <div class="welcom-search">
                    <a href="#" class="custom-btn btn-add">
                        <i class="fa fa-plus"></i>
                        <span>أضف إعلان</span>
                    </a>
                    <form class="form-inline" method="" action="">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="ابحث عن سلعة...">
                        </div>
                        <button type="submit" class="custom-btn .btn-block">
                            <i class="fa fa-search"></i>
                        </button>
                    </form><!--End Form-->
                </div><!--End Welcom-searche-->
            </div><!--End Container-->
        </section><!--End welcom-section-->
        <section class="section-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <aside>
                            <div class="aside-head">
                                <h3 class="title title-lg">انشط المدن</h3>
                            </div><!-- End Aside-Head -->
                            <div class="aside-content">
                                <ul class="aside-list">
                                    <li>
                                        <a href="#"> #سوق_الرياض</a>
                                    </li>
                                    <li>
                                        <a href="#"> #سوق_جدة</a>
                                    </li>
                                    <li>
                                        <a href="#"> #سوق_مكة</a>
                                    </li>
                                    <li>
                                        <a href="#"> #سوق_الطائف</a>
                                    </li>
                                    <li>
                                        <a href="#"> #سوق_القصيم</a>
                                    </li>
                                </ul>
                            </div><!-- End Aside-Content -->
                        </aside><!-- End Aside -->
                    </div><!-- End col -->
                    <div class="col-md-9">
                        <section class="category">
                            <ul class="category-icons">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 0)
                                    <li>
                                        <a class="box-icon" href="{{route('site.category',['slug'=>$category->slug])}}">
                                            <div class="box-head">
                                                <span class="fa {{$category->icon}}"></span>
                                            </div><!-- End Box-Head -->
                                            <div class="box-content">
                                                <h3 class="title title-md">
                                                    {{$category->translated()->name}}
                                                </h3>
                                            </div><!-- End Icon-Box-Content -->
                                        </a><!-- End Icon-Box -->
                                    </li>
                                    @endif
                                @endforeach
                            </ul><!--End category-icons-->
                        </section><!-- End Category-Section -->
                        <section class="">
                            @foreach($ads as $ad)
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
                                        <a href="single.html">
                                            <h3 class="title">{{$ad->translated()->name}}</h3>
                                        </a>
                                        <span class="price">{{$ad->price}}  ر.س</span>
                                    </div><!-- End Title-Price -->
                                    <div class="cat-item-info">
                                        <div class="cat-item-map">
                                            <i class="fa fa-map-marker"></i>
                                            {{$ad->city}}
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
                            @endforeach
                        </section><!-- End Section -->
                        {{$ads->links()}}
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!--End page-content-->
@endsection