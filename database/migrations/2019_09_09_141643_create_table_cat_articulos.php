<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatArticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('clave');
            $table->string('descripcion');
            $table->boolean('estatus')->default(1);
            $table->date('fecha_baja')->nullable();
            $table->integer('stock_minimo')->nullable();
            $table->integer('stock_maximo')->nullable();
            $table->integer('existencias')->nullable();
            $table->float('precio_unitario',15,2)->nullable();

            $table->integer('id_cuenta')->unsigned();
            $table->foreign('id_cuenta')->references('id')->on('cat_cuentas_contables');  
            
            $table->integer('id_unidad')->unsigned();
            $table->foreign('id_unidad')->references('id')->on('cat_unidades_almacen'); 

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
        Schema::dropIfExists('cat_articulos');
    }
}
