<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoStack extends Model
{
    //
    protected $fillable = ['name','short_title'];

    public function videos()
    {
     	return $this->hasMany('App\Video');
     }
}
