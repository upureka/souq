<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    //get the category
    public function category(){
        return $this->belongsTo('App\Category' ,'category_id');
    }

    //get the details
    public function details(){
        return $this->hasMany('App\TypeTrans' ,'type_id');
    }

    //get the translation
    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    //get the name of the type
    public function getName(){
        return $this->translated()->name;
    }
}
