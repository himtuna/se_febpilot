<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('temp_id');
            $table->string('name');
            $table->string('short_title');
            $table->string('youtube_link')->nullable();
            $table->string('dropbox_link')->nullable();

            $table->enum('liked',['Extremely Disliked','Disliked','Misunderstood', 'Not Watched','Watched','Liked','Extremely Liked'])->nullable();

            $table->string('feedback')->nullable(); // General feedback on this video
            $table->string('discussions')->nullable();  // Did the video generate discussion?
            $table->string('mentions')->nullable();  // Did they mention about this video while taking feedback?
            $table->string('actions')->nullable(); // Did this video encourage them to do any action?   
            $table->string('similar_content')->nullable(); // Are they asking for similar content?
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
        Schema::drop('videos');
    }
}
