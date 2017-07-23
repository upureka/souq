<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    //
    public function getIndex(){
        $packages = Package::get();

        return view('admin.pages.package.index' ,compact('packages'));
    }

    public function postIndex(Request $request ){
        $v = validator($request->all() ,[
            'monthly' => 'required|numeric',
            'quarter' => 'required|numeric',
            'fullYear' => 'required|numeric',
            'amount' => 'required|numeric',
            'en_name' => 'required',
            'ar_name' => 'required'
        ] ,[
            'monthly.required' => 'برجاء ادخال السعر الخاص بالباقه في الشهر',
            'monthly.numeric' => 'يجب ادخال ارقام وليس حروف في السعر الشهري',
            'quarter.required' => 'برجاء ادخال السعر الخاص بالباقه في كل ربع سنه',
            'quarter.numeric' => 'يجب ادخال ارقام وليس حروف في السعر الربع سنوي',
            'fullYear.required' => 'برجاء ادخال السعر الخاص بالباقه في السنه',
            'fullYear.numeric' => 'يجب ادخال ارقام وليس حروف في السعر السنوي',
            'amount.required' => 'برجاء ادخال الكميه الخاصه بالباقه',
            'amount.numeric' => 'كميه الاعلانات يجب ان تكون رقم وليس حروف',
            'en_name.required' => 'برجاء ادخال اسم الباقه باللغه الانجليزيه',
            'ar_name.required' => 'برجاء ادخال اسم الباقه باللغه العربيه'
        ]);

        if($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $package = Package::find($request->id);

        $package->monthly = $request->monthly;
        $package->quarter = $request->quarter;
        $package->fullYear = $request->fullYear;
        $package->amount = $request->amount;

        $package->details()->where('lang' ,'en')->update([
            'name' => $request->en_name
        ]);
        $package->details()->where('lang' ,'ar')->update([
            'name' => $request->ar_name
        ]);

        if($package->save()){
            return ['status' => 'success' ,'data' => 'تم تحديث الباقه بنجاح'];
        }

        return ['status' => false , 'data' => 'حدث خطا اثناء تحديث بيانات الباقه'];
    }
}
