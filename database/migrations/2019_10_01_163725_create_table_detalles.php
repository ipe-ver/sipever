<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id_detalle');

            $table->integer('id_consumo')->unsigned();
            $table->foreign('id_consumo')->references('id_consumo')->on('consumos');

            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('cat_articulos');

            $table->integer('id_compra')->unsigned();
            $table->foreign('id_compra')->references('id_compra')->on('compras');

            $table->integer('tipo_movimiento');
            $table->integer('cantidad');
            $table->double('precio_unitario');
            $table->double('subtotal');

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
        Schema::dropIfExists('detalles');
    }
}
