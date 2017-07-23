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
                <li class="active"><a href="{{route('site.profile.public' ,['username' => $member->username])}}">نبذة عنى</a></li>
                <li><a href="{{route('site.profile.ads' ,['username' => $member->username])}}">اعلاناتى</a></li>
                <li><a href="{{route('site.profile.contact' ,['username' => $member->username])}}">تواصل معى</a></li>
            </ul><!--End profile-nav-->
        </div><!-- End  Container-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-sm">
            <div class="container">
                <div class="account-info">
                    <h3 class="title">نبذة عن ما اقوم به</h3>
                    <p class="section-txt">
                        {{$member->bio}}
                    </p>
                    <ul class="social-list">
                        @if(!empty($member->linkdin))
                        <li>
                            <a href="{{$member->linkdin}}">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        @endif
                        @if(!empty($member->google))
                        <li>
                            <a href="{{$member->google}}">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        @endif
                        @if(!empty($memner->twitter))
                        <li>
                            <a href="{{$member->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        @endif
                        @if(!empty($member->facebook))
                        <li>
                            <a href="{{$member->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div><!--End box-item-->
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection