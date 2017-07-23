<?php

namespace App\Http\Controllers\Site;

use App\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Message;

class PublicController extends Controller
{
    //
    public function getIndex($username){
        $member = Member::where('username' ,$username)->first();

        return view('site.pages.public.index' ,compact('member'));
    }

    public function getAds($username){
        $member = Member::where('username' ,$username)->first();
        $ads = Ad::where('member_id' ,Member::where('username' ,$username)->value('id'))->paginate(9);

        return view('site.pages.public.ads' ,compact('ads','member'));
    }

    public function getContact($username){
        $member = Member::where('username' ,$username)->first();

        return view('site.pages.public.contact' ,compact('member'));
    }

    public function postContact(Request $request ,$username){
        $v = validator($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ],[
            'name.required' => 'برجاء ادخال اسمك',
            'email.required' => 'برجاء ادخال بريدك الالكتروني',
            'email.email' => 'يجب ادخال محتوي علي هيئه بريد الكتروني ',
            'subject.required' => 'برجاء ادخال عنوان الرساله',
            'message.required' => 'برجاء ادخال رسالتك'
        ]);

        if($v->fails()){
            return ['response' => 'warning' ,'msg' => implode("<br>" ,$v->errors()->all())];
        }

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->member_id = Member::where('username' ,$username)->value('id');

        if($message->save()){
            return ['response' => 'success' ,'msg' => 'تم ارسال رسالتك بنجاح'];
        }

        return ['response' => 'error' ,'msg' => 'حدث خطا اثناء ارسال رسالتك برجاء المحاوله لاحقا'];
    }
}
