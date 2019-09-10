<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatOficinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('clave',4);
            $table->string('nombre');
            $table->boolean('estatus')->default(1);

            $table->integer('id_ubpp')->unsigned()->nullable();
            $table->foreign('id_ubpp')->references('id')->on('cat_ubpp');
            
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
        Schema::dropIfExists('cat_oficinas');
    }
}
