<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //
    public function blogs(){
        return $this->hasMany('App\Blog' ,'category_id');
    }

    public function arabic(){
        return $this->ar_name;
    }

    public function english(){
        return $this->en_name;
    }
}
