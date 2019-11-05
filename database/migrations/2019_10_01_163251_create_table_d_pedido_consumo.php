<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDPedidoConsumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_pedido_consumo', function (Blueprint $table) {
            $table->increments('id_pedido_consumo_d');

            $table->integer('id_pedido_consumo')->unsigned();
            $table->foreign('id_pedido_consumo')->references('id_pedido_consumo')->on('c_pedido_consumo');

            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('cat_articulos');

            $table->integer('cantidad');
            $table->string('no_folio');
            
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
        Schema::dropIfExists('d_pedido_consumo');
    }
}
