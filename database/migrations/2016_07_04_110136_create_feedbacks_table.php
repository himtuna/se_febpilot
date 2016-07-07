<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("video_id")->references("id")->on("videos");
            $table->integer("member_id")->references("id")->on("members");
            $table->string('detail');
            $table->string('quote')->nullable(); //Qoute from woman on this video
            $table->enum('quality',['General','Insignificant','Great','Success Story']);
            $table->enum('video_liked',['Extremely Disliked','Disliked','Misunderstood', 'Not Watched','Watched','Liked','Extremely Liked'])->nullable();
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
        Schema::drop('feedbacks');
    }
}
