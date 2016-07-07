<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SHGCoordinator extends Model
{
    //
    protected $table = 'shg_coordinators';

    public function villages()
     {
     	return $this->hasMany('App\Village','shg_coordinator_id');
     }

     public function self_help_groups()
     {
     	return $this->hasMany('App\SelfHelpGroup','shg_coordinator_id');
     }
}
