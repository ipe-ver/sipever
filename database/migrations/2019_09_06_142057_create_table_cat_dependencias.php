<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatDependencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clave');
            $table->string('nombre');
            $table->string('depenact')->nullable();
            $table->boolean('estatus')->default(1);

            $table->integer('id_organismo')->unsigned();
            $table->foreign('id_organismo')->references('id')->on('cat_organismos');

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
        Schema::dropIfExists('cat_dependencias');
    }
}
