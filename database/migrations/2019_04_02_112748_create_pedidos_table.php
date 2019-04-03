<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pedido');
            $table->decimal('iva_pedido', 10, 2);
            $table->decimal('total_pedido', 10, 2);
            $table->integer('sucursal_id')->unsigned();
            $table->integer('personal_id')->unsigned();
            $table->integer('mesa_id')->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('mesa_id')->references('id')->on('mesas');
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
        Schema::dropIfExists('pedidos');
    }
}
