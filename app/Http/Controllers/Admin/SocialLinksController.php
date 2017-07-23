<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use SMKFontAwesome\SMKFontAwesome;

class SocialLinksController extends Controller
{
    //

    public function getIndex(){
        $links = Social::get();
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.social.index' ,compact('links','icons'));
    }

    public function getEdit($id){
        $link = Social::find($id);
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.social.edit' ,compact('link','icons'));
    }

    public function postIndex(Request $request){
        $v= validator($request->all(),[
            'icon' => 'required',
            'link' => 'required'
        ],[
            'icon.required' => 'برجاء اختيار الايقونه المناسبه',
            'link.required' => 'برجاء ادخال اللينك'
        ]);

        if ($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL,$request->errors()->all())];
        }

        $social = new Social();

        $social->icon = $request->icon;
        $social->link = $request->link;

        if($social->save()){
            return ['status' => 'success' ,'data' => 'تم ادخال اللينك بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء اضافه اللينك'];
    }

    public function postEdit(Request $request ,$id){
        $v= validator($request->all(),[
            'icon' => 'required',
            'link' => 'required'
        ],[
            'icon.required' => 'برجاء اختيار الايقونه المناسبه',
            'link.required' => 'برجاء ادخال اللينك'
        ]);

        if ($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL,$request->errors()->all())];
        }

        $social = Social::find($id);

        $social->icon = $request->icon;
        $social->link = $request->link;

        if($social->save()){
            return ['status' => 'success' ,'data' => 'تم تحديث اللينك بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء تحديث اللينك'];
    }

    public function getDelete($id=null){
        $social = Social::find($id);

        $social->delete();

        return redirect()->back();
    }
}
