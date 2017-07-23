<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chunk;

class ChunckController extends Controller
{
    //
    public function getIndex(){
        $chunks = Chunk::all();

        return view('admin.pages.chunk.index' ,compact('chunks'));
    }

    public function postIndex(Request $request){
        $v = validator($request->all() ,[
            'numberOfAds' => 'required|numeric',
            'numberOfDays' => 'required|numeric'
        ] ,[
            'numberOfAds.required' => 'برجاء ادخال عدد الاعلانات المراد تمييزها',
            'numberOfAds.numeric' => 'يجب ادخال ارقام في خانه عدد الاعلانات',
            'numberOfDays.required' => 'برجاء ادخال عدد الايام المراد تمييز الاعلان فيها',
            'numberOfDays.numeric' => 'يجب ادخال ارقام في خانه عدد الايام'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $chunk = Chunk::find($request->id);

        $chunk->numberOfAds = $request->numberOfAds;
        $chunk->numberOfDays = $request->numberOfDays;
        if(!empty($request->sale)){
            $chunk->sale = $request->sale;
        }

        if($chunk->save()){
            return ['status' => 'succes' ,'data' => 'تم تعديل بيانات الحزمه بنجاح'];
        }
        return ['status' => false ,'data' => 'حدث خطا اثناء تحديث بيانات الحزمه'];
    }
}
