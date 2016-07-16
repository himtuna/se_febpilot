<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('date')->nullable();
            $table->text('body')->nullable();
            $table->string('images',2083)->nullable(); // image urls (comma separated)
            $table->string('videos',2083)->nullable(); // video urls (comman separated)
            $table->string('tags')->nullable(); // To color code various timeline elements and make headings
            $table->tinyInteger('weight'); // sorting by weight
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
        Schema::drop('timelines');
    }
}
