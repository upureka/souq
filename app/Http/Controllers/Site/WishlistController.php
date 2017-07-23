<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use Auth;

class WishlistController extends Controller
{
    //
    public function postIndex(Request $request){
        if(!auth()->guard('members')->check()){
            return ['status' => 'warning' ,'msg' => 'برجاء تسجيل الدخول اولا'];
        }

        $itemId = Wishlist::where('ad_id' ,$request->ad_id)->where('member_id' ,Auth::guard('members')->user()->id)->value('id');
        if(sizeof($itemId) > 0){
            Wishlist::where('ad_id' ,$request->ad_id)->where('member_id' ,Auth::guard('members')->user()->id)->delete();

            return ['response' => 'error' ,'msg' => 'تم حذف الاعلان من قائمه المفضله بنجاح'];
        }else{
            $wishlist = new Wishlist();

            $wishlist->ad_id = $request->ad_id ;
            $wishlist->member_id = Auth::guard('members')->user()->id ;

            if($wishlist->save()){
                $count = Wishlist::where('member_id' ,Auth::guard('members')->user()->id)->count();
                return ['response' => 'success' ,'msg' => 'تمت اضافه الاعلان الي قائمه المفضله'];
            }
            return ['response' => 'error' ,'msg' => 'خطا اثناء اضافه الاعلان لقائمه المفضله'];
        }
    }
}
