<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;

class BlogController extends Controller
{
    /////////////////////////category section /////////////////////////////////

    public function getIndex(){
        $categories = BlogCategory::all();

        return view('admin.pages.blogs.category.index' ,compact('categories'));
    }

    public function getEdit($id){
        $category = BlogCategory::find($id);

        return view('admin.pages.blogs.category.edit' ,compact('category'));
    }

    public function postIndex(Request $request ){
        $v= validator($request->all() ,[
            'en_name' => 'required',
            'ar_name' => 'required'
        ] ,[
            'en_name.required' => 'برجاء ادخال اسم القسم باللغه الانجليزيه',
            'ar_name.required' => 'برجاء ادخال اسم القسم باللغه العربيه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $category  =new BlogCategory();

        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->slug = str_slug($request->en_name);

        if($category->save()){
            return ['status' => 'success' ,'data' => 'تم ادخال القسم بنجاح'];
        }
        return ['status' => false ,'data' => 'حدث خطا اثناء ادخال القسم '];
    }

    public function postEdit(Request $request , $id){
        $v= validator($request->all() ,[
            'en_name' => 'required',
            'ar_name' => 'required'
        ] ,[
            'en_name.required' => 'برجاء ادخال اسم القسم باللغه الانجليزيه',
            'ar_name.required' => 'برجاء ادخال اسم القسم باللغه العربيه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $category = BlogCategory::find($id);

        $category->en_name = $request->en_name;
        $category->ar_name = $request->ar_name;
        $category->slug = str_slug($request->en_name);

        if($category->save()){
            return ['status' => 'success' ,'data' => 'تم تحديث القسم بنجاح'];
        }
        return ['status' => false ,'data' => 'حدث خطا اثناء تحديث القسم '];
    }

    public function getDelete($id = null) {
        $category = BlogCategory::find($id);
        foreach ($category->blogs as $blog) {
            $blog->details()->delete();
        }

        $category->blogs()->delete();
        $category->delete();

        return redirect()->back();
    }


    ////////////////////////////////// blogs section //////////////////////////
    public function getBlogs(){
        $blogs = Blog::get();
        $blogcategories = BlogCategory::get();

        return view('admin.pages.blogs.index' ,compact('blogcategories' ,'blogs'));
    }

    public function getEditBlog($id){
        $blog = Blog::find($id);
        $blogcategories = BlogCategory::get();

        return view('admin.pages.blogs.edit' ,compact('blogcategories' ,'blog'));
    }

    public function postBlog(Request $request){
        $v = validator($request->all() ,[
            'category_id' => 'required',
            'en_title' => 'required',
            'ar_title' => 'required',
            'desc1' => 'required',
            'desc2' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'ar_tags' => 'required',
            'en_tags' => 'required'
        ] ,[
            'category_id.required' => 'برجاء اختيار القسم التابع له هذه المدونه',
            'en_title.required' => 'برجاء ادخال اسم المدونه باللغه الانجليزيه',
            'ar_title.required' => ' برجاء ادخال اسم المدونه باللغه العربيه',
            'desc1.required' => 'برجاء ادخال محتوي المدونه باللغه العربيه',
            'desc2.required' => 'برجاء ادخال محتوي المدونه باللغه الانجليزيه',
            'image.required' => 'برجاء ادخال صوره',
            'image.mimes' => 'الصوره يجب ان تكون من نوع : jpeg,jpg,png,gif',
            'image.max' => 'يجب الا تزيد مساحه الصوره عن 2 ميجا',
            'ar_tags.required' => 'برجاء ادخال الكلمات المفتاحيه للبحث عن المدونه باللغه العربيه',
            'en_tags.required' => 'برجاء ادخال الكلمات المفتاحيه للبحث عن المدونه باللغه الانجليزيه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $blog = new Blog();

        $blog->category_id = $request->category_id;
        $blog->slug = str_slug($request->en_title);
        $destination = storage_path('uploads/blogs');
        if ($request->image) {
            $blog->image = $request->image->getClientOriginalName();
            $request->image->move($destination, $blog->image);
        }

        if($blog->save()){
            $blog->details()->create([
                'title' => $request->en_title,
                'description' => $request->desc1,
                'tags' => $request->en_tags,
                'lang' => 'en'
            ]);

            $blog->details()->create([
                'title' => $request->ar_title,
                'description' => $request->desc2,
                'tags' => $request->ar_tags,
                'lang' => 'ar'
            ]);

            return ['status' => 'success' ,'data' => 'تم ادخال بيانات المدونه بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء اضافه بيانات المدونه'];
    }

    public function postEditBlog(Request $request ,$id){
        $v = validator($request->all() ,[
            'category_id' => 'required',
            'en_title' => 'required',
            'ar_title' => 'required',
            'desc1' => 'required',
            'desc2' => 'required',
            'ar_tags' => 'required',
            'en_tags' => 'required'
        ] ,[
            'category_id.required' => 'برجاء اختيار القسم التابع له هذه المدونه',
            'en_title.required' => 'برجاء ادخال اسم المدونه باللغه الانجليزيه',
            'ar_title.required' => ' برجاء ادخال اسم المدونه باللغه العربيه',
            'desc1.required' => 'برجاء ادخال محتوي المدونه باللغه العربيه',
            'desc2.required' => 'برجاء ادخال محتوي المدونه باللغه الانجليزيه',
            'ar_tags.required' => 'برجاء ادخال الكلمات المفتاحيه للبحث عن المدونه باللغه العربيه',
            'en_tags.required' => 'برجاء ادخال الكلمات المفتاحيه للبحث عن المدونه باللغه الانجليزيه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $blog = Blog::find($id);

        $blog->category_id = $request->category_id;
        $destination = storage_path('uploads/blogs');
        if ($request->image) {
            @unlink($destination . "/{$blog->image}");
            $blog->image = $request->image->getClientOriginalName();
            $request->image->move($destination, $blog->image);
        }

        $blog->details()->where('lang' , 'en')->update([
            'title' => $request->en_title,
            'description' => $request->desc2,
            'tags' => $request->en_tags,
        ]);
        $blog->details()->where('lang' , 'ar')->update([
            'title' => $request->ar_title,
            'description' => $request->desc1,
            'tags' => $request->ar_tags,
        ]);

        if($blog->save()){
            return ['status' => 'success' , 'data' => 'تم تحديث بيانات المدونه بنجاح'];
        }

        return ['status' => false ,'data' => 'حدث خطا اثناء تحديث بيانات المدونه'];
    }

    public function getDeleteBlog($id = null){
        $blog = Blog::find($id);

        $blog->details()->delete();
        $blog->delete();

        return redirect()->back();
    }
}
