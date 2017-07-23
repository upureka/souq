<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function details(){
        return $this->hasMany('App\BlogTrans' ,'blog_id');
    }

    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    public function getTitle(){
        return $this->translated()->title;
    }

    public function getDesc(){
        return $this->translated()->description;
    }

    public function category(){
        return $this->belongsTo('App\BlogCategory', 'category_id');
    }
}
