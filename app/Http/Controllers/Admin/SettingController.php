<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;

class SettingController extends Controller
{
    //

    public function getIndex() {
        $setting = Settings::first();
        return view('admin.pages.settings.index', compact('setting'));
    }

    public function postIndex(Request $request) {
        $v = validator($request->all(), [
            'site_name' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png,gif|max:20000000',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
            'linkdin' => 'required',
            'meta_author' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'whats' => 'required'
                ], [
            'site_name.required' => 'برجاء ادخال اسم الموقع',
            'logo.requried' => 'برجاء ادخال لوجو الموقع',
            'logo.mimes' => 'نوع الصوره يجب ان يكون : jpeg,jpg,png,gif',
            'logo.max' => 'يجب الا يزيد حجم الصوره عن 20 ميجا بايت',
            'email.required' => 'برجاء ادخال البريد الالكتروني الخاص بالموقع',
            'address.required' => 'برجاء ادخال العنوان الخاص بالشركه',
            'phone.required' => 'برجاء ادخال رقم الهاتف الخاص بالشركه',
            'facebook.required' => 'برجاء ادخال رابط صفحه الفيسبوك',
            'twitter.required' => 'برجاء ادخال رابط صفحه تويتر',
            'google.required' => 'برجاء ادخال رابط حساب جوجل بلس',
            'youtube.required' => 'برجاء ادخال رابط القناه الخاصه بالشركه في اليوتيوب',
            'linkdin.required' => 'برحاء ادخال رابط لينكد ان الخاص بالموقع',
            'meta_author.required' => 'برجاء ادخال اسم مؤلف الموقع',
            'meta_keywords.required' => 'برجاء ادخال الكلمات المفتاحيه للموقع',
            'meta_description.required' => 'برجاء ادخال وصف الموقع',
            'whats.required' => 'برجاء ادخال رقم الواتس'
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $setting = Settings::first();

        $setting->site_name = $request->site_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->google = $request->google;
        $setting->youtube = $request->youtube;
        $setting->linkdin = $request->linkdin;
        $setting->instagram = $request->instagram;
        $setting->meta_author = $request->meta_author;
        $setting->meta_keywords = $request->meta_keywords;
        $setting->meta_description = $request->meta_description;
        $setting->whats = $request->whats;

        $destination = storage_path('uploads/logo');
//        dd($request->logo);
        if ($request->logo) {
            @unlink($destination . "/{$setting->logo}");
            $setting->logo = $request->logo->getClientOriginalName();
            $request->logo->move($destination, $setting->logo);
        }

        if ($setting->save()) {
            return ['status' => 'success', 'data' => 'تم تحديث بيانات الموقع بنجاح'];
        }

        return ['status' => false, 'data' => 'لقد حدث خطا اثناء تعديل بيانات الموقع'];
    }

    public function getMap() {
        $setting = Settings::first();

        return view('admin.pages.settings.map', compact('setting'));
    }

    public function postMap(Request $request) {
        $v = validator($request->all(), [
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required'
                ], [
            'address.required' => 'برجاء ادخال العنوان من الخريطه',
            'lat.required' => 'برجاء ادخال خطوط العرض من الخريطه',
            'long.required' => 'برجاء ادخال خطوط الطول من الخريطه'
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $settings = Settings::first();

        $settings->address = $request->address;
        $settings->long = $request->long;
        $settings->lat = $request->lat;

        if ($settings->save()) {
            return ['status' => 'success', 'data' => 'تم ادخال العنوان بنجاح'];
        }

        return ['status' => false, 'data' => 'لم يتم ادخال البيانات برجاء المحاوله لاحقا'];
    }

}
