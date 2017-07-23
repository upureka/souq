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
                <li><a href="{{route('site.profile.ads' ,['username' => $member->username])}}">اعلاناتى</a></li>
                <li class="active"><a href="{{route('site.profile.contact' ,['username' => $member->username])}}">تواصل معى</a></li>
            </ul><!--End profile-nav-->
        </div><!-- End  Container-->
    </div><!--End page-head-->
    <div class="page-content">
        <section class="section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form class="contact-form" action="{{route('site.profile.contact',['username' => $member->username])}}" method="post">
                            {!! csrf_field() !!}
                            <div class="heading text-center margin-btm-15">
                                <h3 class="title">ابق على تواصل</h3>
                            </div><!--End heading-->
                            <div class="form-group col-md-4">
                                <input class="form-control" placeholder="الأسم" name="name" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" placeholder="البريد الإلكترونى" name="email" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" placeholder="الموضوع" type="text" name="subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" type="text" placeholder="الرسالة" rows="6" name="message"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <button class="custom-btn" type="submit"> ارسال</button>
                            </div>
                        </form><!--End Contact-Form-->
                    </div><!--End col-md-12-->
                </div>
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection