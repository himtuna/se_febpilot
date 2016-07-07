<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer("shg_coordinator_id")->references("id")->on("shg_coordinators");

            $table->tinyInteger('distance')->nullable(); //Distance from PPES
            $table->enum('economic_status',['High','Medium','Low']);
            $table->string('economic_status_detail')->nullable();
            $table->enum('caste_status',['High','Medium','Low']);
            $table->string('caste_status_detail')->nullable();
            $table->string('govt_scheme')
            $table->boolean('dbp_scheme')->default(0);
            $table->boolean('soap_making_scheme')->default(0);
            $table->boolean('ppes_students')->default(0); //Girls from village stuyding in PPES
            $table->smallInteger('total_shgs')->nullable();
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
        Schema::drop('villages');
    }
}
