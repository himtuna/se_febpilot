<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("phone_id")->references("id")->on("phones");
            $table->integer("video_stacks_id")->references("id")->on("video_stacks");

            //Weekly Logs
            $table->string('status')->nullable();
            $table->integer("village_id")->references("id")->on("villages");
            $table->date('log_updated_on')->nullable();
            $table->tinyInteger('battery_percentage')->nullable();
            $table->boolean('calling_usage')->nullable();
            $table->boolean('camera_usage')->nullable();
            $table->boolean('microsd_usage')->nullable();
            $table->boolean('newapps_usage')->nullable();
            $table->boolean('games_usage')->nullable();
            $table->boolean('new_media_content')->nullable();
            $table->boolean('wallpaper_changed')->nullable();
            

            $table->boolean('app_deleted')->nullable();
            $table->boolean('app_refreshed')->nullable();
            $table->boolean('app_video_deleted')->nullable();
            $table->boolean('phone_shared')->nullable();
            
            $table->boolean('hindi_interface')->nullable();
            
            $table->boolean('phone_damaged')->default(0);
            $table->string('issues')->nullable();
            $table->string('findings')->nullable();



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
        Schema::drop('phone_logs');
    }
}
