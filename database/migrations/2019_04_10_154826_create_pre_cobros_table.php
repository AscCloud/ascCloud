<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_pre_cobro', 150)->nullable()->default('Alimentación');
            $table->date('fecha_pre_cobro');
            $table->decimal('total_pre_cobro', 10, 2);
            $table->integer('cliente_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('pre__cobros');
    }
}
