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
        Schema::create('pre__cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_pre_cobro', 150)->nullable()->default('Consumo de Alimentos');
            $table->date('fecha_pre_cobro');
            $table->decimal('total_pre_cobro', 10, 2);
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
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
        Schema::dropIfExists('pre__cobros');
    }
}
