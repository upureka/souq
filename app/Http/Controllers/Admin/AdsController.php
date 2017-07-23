<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{
    //
    public function getIndex(){
        $ads = Ad::get();

        return view('admin.pages.ads.index' ,compact('ads'));
    }

    public function postChangeStatus(Request $request){
        $ad = Ad::find($request->id);

        if($request->type == 0){
            $ad->update(['approved' => 0]);

            return ['status' => 'success'];
        }else if($request->type == -1){
            $ad->update(['approved' => -1]);

            return ['status' => 'success'];
        }else if ($request->type == 1){
            $ad->update(['approved' => 1]);

            return ['status' => 'success'];
        }
    }

    public function getDelete($id = null){
        $ad = Ad::find($id);

        $ad->details()->delete();
        $ad->images()->delete();
        $ad->delete();

        return redirect()->back();
    }
}
