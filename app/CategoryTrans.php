<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTrans extends Model
{
    //
    protected $fillable = ['name' ,'lang'];

    public function category(){
        return $this->belongsTo('App\Category' ,'category_id');
    }
}
