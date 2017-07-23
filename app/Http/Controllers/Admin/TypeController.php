<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    //
    public function getIndex($id){
        $types = Type::where('category_id' ,$id)->get();

        return view('admin.pages.types.index', compact('types','id'));
    }

    public function getEdit($id){
        $type = Type::find($id);

        return view('admin.pages.types.edit',compact('type'));
    }

    public function postIndex(Request $request,$id){
        $v = validator($request->all(),[
            'en_name' => 'required',
            'ar_name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000'
        ],[
            'en_name.required' => 'برجاء ادخال الاسم باللغه الانجليزيه',
            'ar_name.required' => 'برجاء ادخال الاسبم باللغه العربيه',
            'image.required' => 'برجاء ادخال صوره',
            'image.mimes' => 'الصوره يجب ان تكون من نوع : jpeg,jpg,png,gif',
            'image.max' => 'يجب الا تزيد مساحه الصوره عن 20 ميجا'
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $type = new Type();

        $type->category_id = $id;
        $destination = storage_path('uploads/types');
        if ($request->image) {
//            @unlink($destination . "/{$ads->image}");
            $type->image = $request->image->getClientOriginalName();
            $request->image->move($destination, $type->image);
        }

        if($type->save()){
            $type->details()->create([
                'name' => $request->en_name,
                'lang' => 'en'
            ]);

            $type->details()->create([
                'name' => $request->ar_name,
                'lang' => 'ar'
            ]);

            return ['status' => 'success' ,'data' => 'تم اضافه الفئه بنجاح'];
        }

        return ['status' => 'error' ,'data' => 'حدث خطا اثناء اضافه الفئه '];
    }

    public function postEdit(Request $request ,$id){
        $v = validator($request->all() ,[
            'name' => 'required|min:3'
        ] ,[
            'name.required' => 'برجاء ادخال اسم القسم',
            'name.min' => 'اسم القسم يجب الا يقل عن 3 حروف'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $type = Type::find($id);

        $destination = storage_path('uploads/types');
        if ($request->image) {
//            @unlink($destination . "/{$ads->image}");
            $type->image = $request->image->getClientOriginalName();
            $request->image->move($destination, $type->image);
        }

        if($type->save()){
            $type->details()->where('lang' ,$request->lang)->update([
                'name' => $request->name
            ]);

            return ['status' => 'success' ,'data' => 'تم تعديل الفئه بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء تعديل الفئه'];
    }

    public function getDelete($id = null){
        $type = Type::find($id);

        $type->details()->delete();
        $type->delete();

        return redirect()->back();
    }
}
