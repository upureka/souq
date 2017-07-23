<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    //
    public function getIndex(){
        $about = About::where('lang' ,app()->getLocale())->get();

        return view('admin.pages.about.index' ,compact('about'));
    }

    public function getEdit($id){
        $about = About::where('about_id' ,$id)->get();

        return view('admin.pages.about.edit' ,compact('about'));
    }

    public function postIndex(Request $request ,$id){
//        dd($request->all());
        $v = validator($request->all(),[
            'title' => 'required',
            'description' => 'required'
        ],[
            'title.required' => 'برجاء ادخال العنوان',
            'description.required' => 'برجاء ادخال المحتوي'
        ]);

        if ($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL,$v->errors()->all())];
        }

        $about = About::find($id);

        $about->title = $request->title;
        $about->content = $request->description;

        if($about->save()){
            return ['status' => 'success' ,'data' => 'تم تحديث البيانات بنجاح'];
        }

        return ['status' => false , 'data' => 'حدث خطا اثناء تحديث البيانات'];
    }
}
