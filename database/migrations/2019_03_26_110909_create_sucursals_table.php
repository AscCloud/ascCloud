<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSucursalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_sucursal', 60);
            $table->string('direccion_sucursal', 200);
            $table->string('telefono_sucursal', 10);
            $table->string('secuencial_sucursal', 9)->default('000000000');
            $table->string('secuencial_preimpreso_sucursal', 9)->default('000000000');
            $table->string('establecimiento_sucursal', 3);
            $table->string('punto_emision_sucursal', 3);
            $table->string('img_sucursal', 200)->nullable();
            $table->boolean('cobro_servicio_sucursal')->default(false);
            $table->boolean('factura_preimpresa_sucursal')->default(false);
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sucursals');
    }
}
