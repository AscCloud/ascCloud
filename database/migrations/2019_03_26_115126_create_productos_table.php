<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_producto', 60);
            $table->decimal('precio_producto', 10, 2);
            $table->string('img_producto', 200);
            $table->integer('iva_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('iva_id')->references('id')->on('ivas');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
