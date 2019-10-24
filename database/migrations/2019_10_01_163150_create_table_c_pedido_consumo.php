<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCPedidoConsumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_pedido_consumo', function (Blueprint $table) {
            $table->increments('id_pedido_consumo');

            $table->integer('id_oficina')->unsigned();
            $table->foreign('id_oficina')->references('id')->on('cat_oficinas');

            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos');

            $table->integer('folio');
            $table->integer('tipo_movimiento');
            $table->date('fecha_movimiento')->nullable();
            $table->date('fecha_recepcion')->nullable();
            $table->boolean('recibido')->default(0);
            $table->boolean('extemporaneo')->default(0);

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
        Schema::dropIfExists('c_pedido_consumo');
    }
}
