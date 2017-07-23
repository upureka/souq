<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTrans extends Model
{
    //
    protected $fillable = ['title' ,'description' ,'tags' ,'lang'];
    public function blog(){
        return $this->belongsTo('App\Blog' ,'blog_id');
    }
}
