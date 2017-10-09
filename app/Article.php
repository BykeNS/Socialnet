<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Article extends Model
{

   protected $fillable = [
   	'user_id','live','content','post_on'
   ];
   protected $dates =['post_on'];

   public function getShortContentAttribute()
   {
       return substr($this->content,0,random_int(60,150)).'...';
   }
   public function setPostOnAttribute($value)
   {
     $this->attributes['post_on']=Carbon::parse($value);
   }
}
