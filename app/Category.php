<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['parent_id'];
    //get the details of the translations
    public function details(){
        return $this->hasMany('App\CategoryTrans' ,'category_id');
    }

    //get the translation
    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    //get the types
    public function types(){
        return $this->hasMany('App\Type' ,'category_id');
    }

    //Get Category Name
    public function getName(){
        return $this->translated()->name;
    }

    //main Category
    public function main(){
        return $this->belongsTo('App\Category' ,'parent_id');
    }

    //sub categories
    public function sub(){
        return $this->hasMany('App\Category' ,'parent_id');
    }

    //all ads
    public function ads(){
        return $this->hasMany('App\Ad' ,'category_id');
    }
}
