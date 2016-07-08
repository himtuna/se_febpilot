<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //


    protected $fillable = ['name','village_id','self_help_group_id','membership','samhu_saheli','economic_status','economic_status_detail','caste_status','caste_status_detail','religion','house_type','education','can_write','travel_outside','children','family_members','shg_value','phone_id','profile','feedback','success_story','feedback_video','bank_account'];



    public function shg()
     {
     	return $this->belongsTo('App\SelfHelpGroup');
     }

     public function village()
     {
     	return $this->belongsTo('App\Village');
     }

     public function feedbacks()
     {
         return $this->hasMany('App\feedback');
     }
     
}
