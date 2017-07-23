<?php

namespace App\Http\Controllers\Site;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest.site', ['except' => ['logout']]);
    }

    public function getLogin()
    {
        return view('site.pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if ($user=Member::where('username',$username)->orWhere('phone',$username)->orWhere('email',$username)->first())
        {
            if (Hash::check($password,$user->password))
            {
                if ($user->confirm == 0){
                    return ['response'=>'success', 'message'=>'يتم الان تحويلك لصفحه تفعيل الحساب','url' => route('site.confirm',['username'=>$user->username])];
                }else{
                    auth()->guard('members')->login($user,$request->remember);
                    return ['response'=>'success','message'=>'تم التسجيل بنجاح'];
                }
            }else{
                return ['response'=>'error','message'=>'كلمه المرور خظأ'];
            }
        }
        return ['response'=>'error','message'=>'المستخدم غير موجود'];
    }

    public function getRegister()
    {
        return view('site.pages.auth.register');
    }

    public function postRegister(Request $request)
    {
        $v = validator($request->all(),[
            'username'=>'required',
            'email'=>'required|unique:members,email',
            'phone'=>'required',
            'password'=>'required',
        ]);
        if ($v->fails())
        {
            return ['status'=>false,'message'=>implode("\n",$v->errors()->all())];
        }
        $code ='';
        for ($i=0;$i<5;$i++)
        {
            $code = mt_rand(0,9);
        }
        $member = new  Member();
        $member->username = $request->username;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
        $member->city_id = $request->city_id;
        $member->code = $code;
        $member->confirm = 0;

        if ($member->save())
        {
            Mail::send('site.mails.confirm-phone',['code'=>$code],function ($m) use ($member){
                $m->to($member->email,$member->username)->subject('Confirm Your Number');
            });
            return ['response'=>'success', 'url' => route('site.confirm',['username'=>$member->username])];
        }
        return ['response'=>'error'];
    }
    public function logout()
    {
        auth()->guard('members')->logout();
        return redirect('/auth');
    }
    public function getConfirm($username)
    {
        $user=Member::where('username',$username)->first();
//        dd($user);
        return view('site.pages.auth.confirm-phone')->with('user',$user);
    }
    public function postConfirm(Request $request)
    {
        $v = validator($request->all(),[
            'code'=>'required'
        ]);
        if ($v->fails())
        {
            return ['response'=>'error','message'=>'رقم التاكيد مطلوب'];
        }
        $user = Member::find($request->user_id);
        if ($request->code == $user->code){
            $user->update(['confirm'=>1]);
            auth()->guard('members')->login($user);
            return ['response'=>'success' ,'url' => route('site.home')];
        }
        return ['response'=>'error','message'=>'رقم التاكيد خطأ'];
    }
}
