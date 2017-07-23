<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function details(){
        return $this->hasMany('App\PackageTrans' ,'package_id');
    }

    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }
}
