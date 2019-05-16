<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreCobroDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_cobro_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detalle_pedido_id')->unsigned();
            $table->integer('pre_cobro_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->foreign('pre_cobro_id')->references('id')->on('pre_cobros');
            $table->foreign('detalle_pedido_id')->references('id')->on('detalle_pedidos');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre__cobro__detalles');
    }
}
