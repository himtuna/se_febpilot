<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelfHelpGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_help_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer("village_id")->references("id")->on("villages");
            $table->integer("shg_coordinator_id")->references("id")->on("shg_coordinators");
            $table->enum('economic_status',['High','Medium','Low'])->nullable();
            $table->string('economic_status_detail')->nullable();
            $table->enum('caste_status',['High','Medium','Low'])->nullable();
            $table->string('caste_status_detail')->nullable(); //Mention Prominent caste of the group
            
            // SHG details
            $table->date('established_on')->nullable();
            $table->integer('monthly_deposit')->nullable();
            $table->boolean('samhu_saheli_member')->default(1);
            $table->enum('shg_meeting_day',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'])->nullable();
            $table->string('shg_meeting_time')->nullable();
            $table->boolean('bank_account')->nullable();
            $table->integer('savings')->nullable();
            $table->string('literacy_level')->nullable();
            $table->string('women_age_avg')->nullable();
            $table->string('family_profession')->nullable();
            $table->string('women_marital_count')->nullable();
            $table->string('phones_count')->nullable(); //Total Phones issued in the village
            $table->string('feedback')->nullable(); // Overall Feedback of pilot SHG wise.
            $table->string('success_story')->nullable(); // Any success story from SHG
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
        Schema::drop('self_help_groups');
    }
}
