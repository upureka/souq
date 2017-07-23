<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

//use Symfony\Component\Console\Helper\ProgressBar;

class ProfileController extends Controller
{
    //
    public function getIndex() {
        $user = User::where('id', auth()->guard('admins')->user()->id)->first();

        return view('admin.pages.profile.index', compact('user'));
    }

    public function postIndex(Request $request) {
        $v = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->guard('admins')->id(),
            'username' => 'required|unique:users,username,' . auth()->guard('admins')->id(),
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:20000',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkdin' => 'required',
            'about' => 'required'
                ], [
            'name.required' => 'برجاء ادخال اسم المستخدم',
            'email.required' => 'برجاء ادخال البريد الالكتروني الخاص بالمستخدم',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
            'username.required' => 'برجاء ادخال الاسم الظاهر ',
            'username.unique' => 'هذا الاسم مستخدم بالفعل',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'address.required' => 'برجاء ادخال العنوان',
            'image.requried' => 'برجاء ادخال صوره المستخدم',
            'image.mimes' => 'نوع الصوره يجب ان يكون : jpeg,jpg,png,gif',
            'image.max' => 'يجب الا يزيد حجم الصوره عن 20 ميجا بايت',
            'facebook.required' => 'برجاء ادخال رابط الفيسبوك',
            'twitter.required' => 'برجاء ادخال رابط تويتر ',
            'linkdin.required' => 'برجاء ادخال رابط لينكد ان',
            'about.required' => 'برجاء ادخال معلومات عن الشخص'
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $user = User::find(auth()->guard('admins')->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->linkdin = $request->linkdin;
        $user->youtube = $request->youtube;
        $user->about = $request->about;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $destination = storage_path('uploads/users');
//        dd($request->logo);
        if ($request->image) {
            @unlink($destination . "/{$user->image}");
            $user->image = $request->image->getClientOriginalName();
            $request->image->move($destination, $user->image);
        }

        if ($user->save()) {
            return ['status' => 'success', 'data' => 'تم تحديث البيانات الشخصيه بنجاح'];
        }
        return ['status' => false, 'data' => 'لقد حدث خطا اثناء تحديث البيانات الشخصيه'];
    }

}
