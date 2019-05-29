<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruc_personal', 20);
            $table->string('nombre_personal', 120);
            $table->string('telefono_personal', 10);
            $table->string('email_personal', 100);
            $table->string('img_personal', 200)->nullable();
            $table->date('nacimiento_personal');
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
        Schema::drop('personals');
    }
}
