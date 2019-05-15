<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_cobro', 200);
            $table->string('vaucher_cobro', 200)->nullable();
            $table->string('tipo_tarjeta_cobro', 200)->nullable();
            $table->date('fecha_cobro');
            $table->decimal('valor_cobro', 10, 2);
            $table->integer('sucursal_id')->unsigned();
            $table->integer('cobro_id')->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('cobro_id')->references('id')->on('cobros');
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
        Schema::dropIfExists('detalle_cobros');
    }
}
