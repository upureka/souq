<?php

namespace App\Http\Controllers\Site;

use App\Ad;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getIndex(){
//        Carbon::setLocale(app()->getLocale());
        $ads = Ad::where('approved' , 1)->orderBy('id' ,'DESC')->paginate(3);

        return view('site.pages.home' ,compact('ads'));
    }

    public function postSubscribe(Request $request){
        $op_array = [
            'response' => 'success',
            'message' => 'تمت الاضافه بنجاح'
        ];

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$email) {
            $op_array['response'] = 'error';
            $op_array['message'] =  'البريد الالكتروني غير صالج';
        }

        $subscribe = Subscriber::where('email', '=', $email)->get()->count();

        if ($subscribe > 0) {
            $op_array['response'] = 'error';
            $op_array['message'] = 'انت مشترك بالفعل';
        } else {
            Subscriber::insert(['email' => $email]);
        }

        return json_encode($op_array);
    }
}
