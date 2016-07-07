<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //
     protected $fillable = ['name','shg_coordinator_id','distance','economic_status','economic_status_detail','caste_status','caste_status_detail','govt_scheme','dbp_scheme','soap_making_scheme','ppes_students','total_shgs'];

     public function shg_coordinator()
     {
     	return $this->belongsTo('App\SHGCoordinator');
     }

     public function self_help_groups()
     {
     	return $this->hasMany('App\SelfHelpGroup');
     }

     public function members()
     {
          return $this->hasMany('App\Member');
     }
     
}
