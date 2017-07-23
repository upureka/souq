<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdTrans extends Model
{
    protected $table = 'ad_trans';
    protected $fillable =['name', 'desc', 'lang', 'ad_id'];
}
