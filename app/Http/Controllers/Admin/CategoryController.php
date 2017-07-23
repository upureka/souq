<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Language;
use SMKFontAwesome\SMKFontAwesome;

class CategoryController extends Controller
{
    //

    public function getIndex(){
        $categories = Category::get();
        $languages = Language::get();
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.category.index' ,compact('categories','languages','icons'));
    }

    public function getEdit($id){
        $category = Category::find($id);
        $categories = Category::where('parent_id' ,'0')->get();
        $languages = Language::get();
        $icons = SMKFontAwesome::getArray();

        return view('admin.pages.category.edit' ,compact('category' ,'languages','icons','categories'));
    }

    public function postIndex(Request $request){
        $v = validator($request->all() ,[
            'en_name' => 'required|min:3',
            'ar_name' => 'required|min:3',
            'isCar' => 'required',
            'icon' => 'required'
        ] ,[
            'en_name.required' => 'برجاء ادخال اسم القسم باللغه الانجليزيه',
            'ar_name.required' => 'برجاء ادخال اسم القسم باللغه العربيه',
            'isCar.required' => 'يجب اختيار نوع القسم',
            'icon.required' => 'برجاء اختيار ايقونه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $category = new Category();

        $category->icon= $request->icon;
        $category->slug = str_slug($request->en_name);
        if(!empty($request->parent_id)){
            $category->parent_id = $request->parent_id;
        }
        $category->isCar = $request->isCar;

        if($category->save()){
            $category->details()->create([
                'name' => $request->en_name,
                'lang' => 'en'
            ]);
            $category->details()->create([
                'name' => $request->ar_name,
                'lang' => 'ar'
            ]);

            return ['status' => 'success' ,'data' => 'تم ادخال القسم بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء اضافه الفسم'];
    }

    public function postMain(Request $request){

        $category = Category::where('id' ,$request->id)->first();


        if($category->parent_id != 0){
            $category->update(['parent_id' => 0]);
        }else{
            if($category->id == $request->parent_id){
                return ['status' => false ,'data' => 'القسم الرئيسي لايجب ان يكون نفس القسم الفرعي'];
            }
            $category->update(['parent_id' => $request->parent_id]);
        }

        return ['status' => 'success' ,'data' => 'تم تغيير حاله القسم بنجاح'];
    }

    public function postEdit(Request $request ,$id){
        $v = validator($request->all() ,[
            'name' => 'required|min:3',
            'isCar' => 'required',
            'icon' => 'required'
        ] ,[
            'name.required' => 'برجاء ادخال اسم القسم',
            'name.min' => 'اسم القسم يجب الا يقل عن 3 حروف',
            'isCar.required' => 'يجب اختيار نوع القسم',
            'icon.required' => 'برجاء اختيار ايقونه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $category = Category::find($id);

        $category->icon = $request->icon;
        $category->parent_id = $request->parent_id;
        $category->isCar = $request->isCar;

        if($category->save()){
            $category->details()->where('lang' ,$request->lang)->update([
                'name' => $request->name
            ]);

            return ['status' => 'success' ,'data' => 'تم تعديل القسم بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء تعديل القسم'];
    }

    public function getDelete($id=null){
        $category = Category::find($id);

        $category->details()->delete();
        $category->sub()->delete();
        $category->types()->delete();
        $category->delete();

        return redirect()->back();
    }
}
