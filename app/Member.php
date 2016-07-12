<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //

protected $guarded = ['id'];
    // protected $fillable = ['name','village_id','self_help_group_id','membership','samhu_saheli','economic_status','economic_status_detail','caste_status','caste_status_detail','religion','house_type','education','can_write','travel_outside','children','family_members','shg_value','phone_id','profile','feedback','success_story','feedback_video','bank_account'];



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
         return $this->hasMany('App\Feedback');
     }

     // public static $education_types = ["No Education" => "No Education","Primary" => "Primary","2nd Class" => "2nd Class","5th Class" => "5th Class","8th Class" => "8th Class","10th Class" => "10th Class","12th Class" => "12th Class","Graduate" => "Graduate","Post-graduate" => "Post-graduate",];

     public static $education_types = ['No Education','Primary','2nd Class','5th Class','8th Class','10th Class','12th Class','Graduate','Post-graduate'];

     public static $marital_types = ['Single','Married','Divorced','Widow','Remarried','Second Wife'];
     
}
