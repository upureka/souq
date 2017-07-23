<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTrans extends Model
{
    //
    protected $fillable = ['name' ,'lang'];

    public function type(){
        return $this->belongsTo('App\Type' ,'type_id');
    }
}
