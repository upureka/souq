@extends('admin.auth.master')
@section('title')
تسجيل الدخول
@endsection
@section('content')
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('admin.login') }}" method="post">
        {{ csrf_field() }}
        <div class="alert alert-success hidden " id="headLogActionSuccess"></div>
        <div class="alert alert-danger hidden " id="headLogActionError"></div>

        <h3 class="form-title font-green">تسجيل الدخول</h3>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم " name="email" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">الرقم السري</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="الرقم السري" name="password" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">تسجيل دخول</button>

            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />تذكرني
                <span></span>
            </label>
        </div>
    </form>
</div>
@endsection