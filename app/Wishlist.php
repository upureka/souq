<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //

    public function ads(){
        return $this->hasMany('App\Ad' ,'ad_id');
    }

    public function member(){
        return $this->belongsTo('App\Member' ,'member_id');
    }
}
