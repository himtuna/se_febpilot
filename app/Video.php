<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    protected $fillable = ['name','short_title','video_stack_id','youtube_link','liked','feedback','success_story'];

    public function video_stack()
     {
     	return $this->belongsTo('App\VideoStack');
     }

     public function feedbacks()
     {
     	return $this->hasMany('App\Feedback');
     }
     
}
