<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id')->nullable();
            $table->string('device_app_name')->nullable();
            $table->enum('phone_colour',['White','Black'])->nullable();
            $table->enum('condition',['OK','Repaired','Lost','Untrackable','Screen Damage','Scren Scratched Significantly','Battery Fused','Device Fused','Charger Fused'])->nullable();
            $table->enum('issued_to',['None','Pilot','SE Team','Can not issue'])->nullable();

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
        Schema::drop('phones');
    }
}
