<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title has-before">من نحن</h3>
                    </div><!--End widget-title-->
                    <div class="widget-content">
                        <p>
                            {{$settings->meta_description}}
                        </p>
                        <ul class="contact-list">
                            @foreach($data as $d)
                                <li>
                                    <i class="fa {{$d->icon}}"></i>
                                    <p>{{$d->value}}</p>
                                </li>
                            @endforeach
                        </ul><!--End social-list-->
                    </div><!--End widget-content-->
                </div><!--End widget-->
            </div><!--End col-md-4-->
            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title has-before">روابط سريعة</h3>
                    </div><!--End widget-title-->
                    <div class="widget-content">
                        <ul class="important-links list-second">
                            <li>
                                <a href="#">الاعلان فى الموقع </a>
                            </li>
                            <li>
                                <a href="#">الاعلان فى الموقع </a>
                            </li>
                            <li>
                                <a href="#">شروط الاستخدام</a>
                            </li>
                            <li>
                                <a href="#">شروط الاستخدام</a>
                            </li>
                            <li>
                                <a href="#">سياسة الخصوصية</a>
                            </li>
                            <li>
                                <a href="#">سياسة الخصوصية</a>
                            </li>
                            <li>
                                <a href="#">مساعدة</a>
                            </li>
                            <li>
                                <a href="#">مساعدة</a>
                            </li>
                            <li>
                                <a href="#">سؤال وجواب</a>
                            </li>
                            <li>
                                <a href="#">سؤال و جواب</a>
                            </li>
                        </ul><!--End important-links-->
                    </div><!--End widget-content-->
                </div><!--End widget-->
            </div><!--End col-md-4-->
            <div class="col-md-4">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title has-before">ابق على تواصل معنا</h3>
                    </div><!--End widget-title-->
                    <div class="widget-content">
                        <form class="subscribe-form" action="{{route('site.subscribe')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="alert alert-success hidden" id="news-alert-success"></div>
                            <div class="alert alert-danger hidden" id="news-alert-error"></div>

                            <input class="form-control" placeholder="ادخل بريدك الالكتروني" type="email" name="email" data-msg-required="برجاء ادخال البريد الالكتروني">
                            <button class="custom-btn" type="submit">اشترك</button>
                        </form><!--End subscribe-form-->
                        <ul class="social-list">
                            @foreach($links as $link)
                                <li>
                                    <a href="{{$link->link}}">
                                        <i class="fa {{$link->icon}}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!--End widget-content-->
                </div><!--End widget-->
            </div><!--End col-md-4-->
        </div><!--End row-->
    </div><!--End container-->
</footer>
<div class="footer-copyright">
    <p>جميع الحقوق محفوظة لموقع اعلانات مبوبه © </p>
</div><!-- End Copy-Right -->