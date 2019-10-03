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
            $table->char('ubpp',4);
            $table->char('oficina',2);
            $table->string('descripcion');
            $table->char('subdir',4);
            $table->boolean('estatus')->default(1);
            $table->string('login');
            
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


