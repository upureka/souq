@extends('site.layouts.master')
@section('title')
    {{Request::route()->username}}
@endsection
@section('content')
    <div class="profile-head">
        <div class="profile-head-img">
            <img src="{{asset('assets/site/images/bg-head.png')}}">
        </div><!-- End home-slider-Img -->
        <div class="container">
            <div class="profile-head-content">
                <div class="profile-img">
                    <img src="{{asset('storage/uploads/members/'.$member->avatar)}}">
                </div>
                <div class="profile-title">
                    <h3 class="title">
                        {{$member->f_name}} {{$member->l_name}}
                    </h3>
                </div><!--End Page-head-title-->
                <div class="rate">
                    <ul class="review-list">
                        <li class="colored">
                            <span class="fa fa-star"></span>
                        </li>
                        <li class="colored">
                            <span class="fa fa-star"></span>
                        </li>
                        <li class="colored">
                            <span class="fa fa-star"></span>
                        </li>
                        <li class="colored">
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                    </ul>
                </div><!--End rate-->
            </div><!--End page-head-content-->
            <ul class="profile-nav">
                <li><a href="{{route('site.profile.public' ,['username' => $member->username])}}">نبذة عنى</a></li>
                <li class="active"><a href="{{route('site.profile.ads' ,['username' => $member->username])}}">اعلاناتى</a></li>
                <li><a href="{{route('site.profile.contact' ,['username' => $member->username])}}">تواصل معى</a></li>
            </ul><!--End profile-nav-->
        </div><!-- End  Container-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        @foreach($ads as $ad)
                        <div class="cat-item">
                            <div class="cat-item-head">
                                <div class="cat-item-img">
                                    <img src="{{asset('storage/uploads/banners/'.$ad->images[0]->image)}}">
                                </div><!--End cat-item-itmg-->
                            </div><!-- End cat-item-head -->
                            <div class="cat-item-content">
                                <div class="title-price">
                                    <a href="single.html">
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
                                        <img src="{{asset('storage/uploads/members/'.$ad->member['avatar'])}}">
                                    </div><!-- End cat-item-Owner-Img -->
                                </div><!--End Action-image-wrapper-->
                            </div><!-- End cat-item-Content -->
                        </div><!-- End cat-item -->
                        @endforeach
                    </div><!--End col-md-10-->
                    {{$ads->links()}}
                </div><!--End row-->
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection