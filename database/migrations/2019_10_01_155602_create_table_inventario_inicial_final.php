<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventarioInicialFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_inicial_final', function (Blueprint $table) {
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos');

            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('cat_articulos');

            $table->integer('cant_inicial');
            $table->integer('existencias');
            $table->double('precio_inicial');
            $table->double('precio_promedio');
            $table->boolean('estatus')->default(1);

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
        Schema::dropIfExists('inventario_inicial_final');
    }
}
