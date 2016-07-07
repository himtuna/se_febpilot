<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //

    protected $fillable =['video_id','member_id','detail','quote','video_liked','quality'];

    public function video()
     {
     	return $this->belongsTo('App\Video');
     }

     public function member()
     {
     	return $this->belongsTo('App\Member');
     }
}
