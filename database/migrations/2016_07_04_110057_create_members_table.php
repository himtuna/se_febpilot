<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("village_id")->references("id")->on("villages");
            $table->integer("self_help_group_id")->references("id")->on("self_help_groups");

            $table->enum('membership',['None','Member','President','Vice-President','Treasurer'])->nullable();
            $table->boolean('samhu_saheli')->default(0);

            $table->enum('economic_status',['High','Medium','Low'])->nullable();
            $table->string('economic_status_detail')->nullable();
            $table->enum('caste_status',['High','Medium','Low'])->nullable();
            $table->string('caste_status_detail')->nullable(); //Mention Prominent caste of the group
            $table->enum('religion',['Hindu','Muslim','Sikh','Christian','Other'])->nullable();

            $table->string('house_type')->nullable(); //House built type (Kacha, Pakka, Big, Small)
            
            // Personality / Survey
            $table->string('education');            
            $table->boolean('can_write')->nullable();
            $table->string('travel_outside')->nullable(); // Has she travelled outside Anupshahr
            $table->tinyInteger('children')->nullable();
            $table->string('family_members')->nullable();
            
            $table->string('shg_value')->nullable();  //Value of SHG meeting for this member

            // Feature Phone Usage
            $table->boolean('feature_phone')->nullable();
            $table->string('feature_phone_usage')->nullable();
            $table->boolean('feature_phone_usage_noncalling')->nullable();
            $table->boolean('feature_phone_assitance')->nullable(); //Can use without assistance
            $table->boolean('feature_phone_own')->nullable(); // has her own featurephone

            // Smartphon Usage
            $table->boolean('smartphone_home')->nullable();
            $table->string('smartphone_home_usage')->nullable();                       

            // TV viewing
            $table->boolean('television')->nullable();
            $table->string('tv_programs')->nullable();


            $table->boolean('bank_account')->nullable();                        
            $table->string('age')->nullable();
            $table->string('family_profession')->nullable();
            $table->string('profession')->nullable();
            $table->enum('marital_status',['Single','Married','Divorced','Widow','Remarried','Second Wife'])->nullable();

            //Phone issued
            $table->integer("phone_id")->references("id")->on("phones")->nullable(); 
            
            // SE Feb Pilot Impact
            $table->enum('smartphone_learning',['None','Basics','SE Video Watching','SE Video Transfer','Calling Feature','Uses Apps/Multimedia Features','Troublshooter'])->nullable();
            $table->string('smartphone_learning_detail')->nullable();
            $table->enum('smartphone_usage',['Not Much','Personal Phone','Family Members'])->nullable();
            $table->string('smartphone_usage_detail'); // Who uses the smartphone

            // Detailed feedback of  woman           
            $table->string('profile')->nullable(); // Profile of woman
            $table->string('feedback')->nullable(); // General Feedback of pilot, her learnings, etc.           
            $table->string('feedback_video')->nullable(); // Dropbox Link to recorded Feedback Video
            $table->string('success_story')->nullable(); // Success Story
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
