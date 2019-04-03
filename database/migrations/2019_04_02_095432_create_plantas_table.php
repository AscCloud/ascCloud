<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_planta', 30);
            $table->decimal('descuento_planta', 8, 2)->nullable();
            $table->integer('sucursal_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plantas');
    }
}
