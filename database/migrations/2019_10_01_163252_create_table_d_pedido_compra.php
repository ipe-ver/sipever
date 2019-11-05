<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDPedidoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_pedido_compra', function (Blueprint $table) {
            $table->increments('id_pedido_compra_d');

            $table->integer('id_pedido_compra')->unsigned();
            $table->foreign('id_pedido_compra')->references('id_pedido_consumo')->on('c_pedido_consumo');

            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id')->on('cat_articulos_compra');

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
        Schema::dropIfExists('d_pedido_compra');
    }
}
