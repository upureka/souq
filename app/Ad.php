<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
   protected $table = 'ads';
   protected $fillable =['category_id', 'member_id', 'condition', 'approved', 'price', 'city', 'type_id', 'slug'];

   public function details()
   {
       return $this->hasMany(AdTrans::class,'ad_id');
   }
   public function translated($local=null)
   {
       return $this->details()->where('lang',$local?:app()->getLocale())->first();
   }
   public function images()
   {
       return $this->hasMany(AdImages::class,'ad_id');
   }
   public function type()
   {
       return $this->belongsTo(Type::class,'type_id');
   }

   public function category(){
       return $this->belongsTo('App\Category' ,'category_id');
   }

   public function member(){
       return $this->belongsTo('App\Member' ,'member_id');
   }

}
