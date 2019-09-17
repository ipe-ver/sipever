<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatExtensiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_extensiones', function (Blueprint $table) {
            $table->increments('id');
            $table->char('extension',4);
            $table->char('telefono',7);
            $table->string('descripcion');
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
        Schema::dropIfExists('cat_extensiones');
    }
}
