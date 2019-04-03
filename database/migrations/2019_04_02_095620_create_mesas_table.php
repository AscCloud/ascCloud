<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMesasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_mesa');
            $table->integer('planta_id')->unsigned();
            $table->boolean('estado_mesa')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('planta_id')->references('id')->on('plantas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mesas');
    }
}
