<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getIndex($slug){
        $category = Category::where('slug',$slug)->first();

        $sub = $category->sub;
        $ads = [];

        if (sizeof($sub) > 0){
            foreach ($sub as $s){
                $ads = $s->ads;
            }
        }else{
            $ads = $category->ads;
        }

//        dd($ads);
        return view('site.pages.category.index' ,compact('category' ,'ads'));
    }
}
