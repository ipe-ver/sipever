<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePolizas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizas', function (Blueprint $table) {
            $table->increments('id_poliza');

            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos'); 

            $table->char('poliza',1)->default('A');
            $table->integer('numero_poliza');
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
        Schema::dropIfExists('polizas');
    }
}
