<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUS;
use SMKFontAwesome\SMKFontAwesome;

class ContactUsController extends Controller
{
    //
    public function getIndex(){
        $data = ContactUS::get();
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.contact.index' ,compact('data' ,'icons'));
    }

    public function getEdit($id){
        $data = ContactUS::find($id);
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.contact.edit' ,compact('data', 'icons'));
    }

    public function postIndex(Request $request){
        $v = validator($request->all() ,[
            'icon' => 'required',
            'title' => 'required',
            'value' => 'required'
        ] ,[
            'icon.required' => 'برجاء اختيار ايقونه',
            'title.required' => 'برجاء ادخال العنوان',
            'value.required' => 'برجاء ادخال المحتوي'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL , $v->errors()->all())];
        }

        $data = new ContactUS();

        $data->icon = $request->icon;
        $data->title = $request->title;
        $data->value = $request->value;

        if($data->save()){
            return ['status' => 'success' ,'data' => 'تم ادخال البيانات بنجاح'];
        }

        return ['status' => false ,'data' => 'خطا اثناء ادخال البيانات'];
    }

    public function postEdit(Request $request ,$id){
        $v = validator($request->all() ,[
            'icon' => 'required',
            'title' => 'required',
            'value' => 'required'
        ] ,[
            'icon.required' => 'برجاء اختيار الايقونه',
            'title.required' => 'برجاء ادخال العنوان',
            'value.required' => 'برجاء ادخال المحتوي'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL , $v->errors()->all())];
        }

        $data = ContactUS::find($id);


        $data->icon = $request->icon;
        $data->title = $request->title;
        $data->value = $request->value;

        if($data->save()){
            return ['status' => 'success' ,'data' => 'تم تحديث البيانات بنجاح'];
        }

        return ['status' => false ,'data' => 'حدذ خطا اثناء ادخال البيانات'];
    }

    public function getDelete($id=null){
        $data = ContactUS::find($id);

        $data->delete();

        return redirect()->back();
    }
}
