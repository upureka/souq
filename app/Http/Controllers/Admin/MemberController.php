<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    //
    public function getIndex(){
        $members = Member::get();

        return view('admin.pages.members.index' ,compact('members'));
    }

    public function getEdit($id){
        $member = Member::find($id);

        return view('admin.pages.members.edit' ,compact('member'));
    }

    public function postIndex(Request $request){
        $v = validator($request->all(),[
            'username'=>'required',
            'email'=>'required|unique:members,email',
            'phone'=>'required',
            'password'=>'required',
        ],[
            'username.required' => 'برجاء ادخال اسم المستخدم',
            'email.required' => 'برجاء ادخال البريد الالكتروني للمستخدم',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
            'email.email' => 'يجب ادخال بيانات بصيغه مناسبه للبريد الالكتروني',
            'phone.required' => 'يجب ادخال رقم هاتف ',
            'password.required' => 'برجاء ادخال رقم سري لتسجيل الدخول'
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode("\n",$v->errors()->all())];
        }

        for ($i=0;$i<5;$i++) {
            $code = mt_rand(0,9);
        }

        $member = new  Member();
        $member->username = $request->username;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
        $member->code = $code;
        $member->confirm = 1;
        $member->approve = 1;

        if($member->save()){
            return ['status' => 'success' ,'data' => 'تم اضافه مستخدم جديد بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء اضافه مستخدم جديد'];
    }

    public function postEdit(Request $request ,$id){
//        dd($request->all());
        $v = validator($request->all(),[
            'username'=>'required',
            'email'=>'required|unique:members,email,'.$id.'|email',
            'phone'=>'required'
        ],[
            'username.required' => 'برجاء ادخال اسم المستخدم',
            'email.required' => 'برجاء ادخال البريد الالكتروني للمستخدم',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
            'email.email' => 'يجب ادخال بيانات بصيغه مناسبه للبريد الالكتروني',
            'phone.required' => 'يجب ادخال رقم هاتف '
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode("\n",$v->errors()->all())];
        }

        $member = Member::find($id);
        $member->username = $request->username;
        $member->email = $request->email;
        $member->phone = $request->phone;
        if ($request->password) {
            $member->password = bcrypt($request->password);
        }

        if($member->save()){
            return ['status' => 'success' ,'data' => 'تم تعديل بيانات المستخدم بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء تعديل بيانات المستخدم'];
    }

    public function postChangeCondition(Request $request ){
        $member = Member::find($request->id);
//        dd($request->type);

        if($request->type == 0){
            $member->update(['approve' => 0]);

            return ['status' => 'success'];
        }
        if($request->type == -1){
            $member->update(['approve' => -1]);

            return ['status' => 'success'];
        }
        if($request->type == 1){
            $member->update(['approve' => 1]);

            return ['status' => 'success'];
        }
    }

    public function getDelete($id = null){
        Member::where('id' ,$id)->delete();

        return redirect()->back();
    }
}
