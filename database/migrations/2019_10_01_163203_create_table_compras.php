<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compra');

            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos');

            $table->integer('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('cat_proveedores');

            $table->integer('id_poliza')->unsigned();
            $table->foreign('id_poliza')->references('id_poliza')->on('polizas');

            $table->string('folio');
            $table->date('fecha_movimiento')->nullable();
            $table->string('no_factura');
            $table->date('fecha_factura')->nullable();
            $table->double('iva');
            $table->double('total');

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
        Schema::dropIfExists('compras');
    }
}
