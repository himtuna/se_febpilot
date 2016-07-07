<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfHelpGroup extends Model
{
    //

    protected $fillable = ['name','village_id','shg_coordinator_id','economic_status','economic_status_detail','caste_status','caste_status_detail','established_on','monthly_deposit','samhu_saheli_member','shg_meeting_day','shg_meeting_time','bank_account','savings','literacy_level','women_age_avg','family_profession','women_marital_count','phones_count','feedback','success_story'];


    public function shg_coordinator()
     {
     	return $this->belongsTo('App\SHGCoordinator');
     }

     public function village()
     {
     	return $this->belongsTo('App\Village');
     }

     public function members()
     {
          return $this->hasMany('App\Member');
     }
}
