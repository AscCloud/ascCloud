<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_cobro');
            $table->integer('pedido_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->integer('precobro_id')->unsigned();
            $table->integer('personal_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('precobro_id')->references('id')->on('pre_cobros');
            $table->foreign('personal_id')->references('id')->on('personals');
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
        Schema::dropIfExists('cobros');
    }
}
