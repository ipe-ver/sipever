<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_proveedor');
            $table->string('rfc');
            $table->string('nombre');
            $table->string('calle');
            $table->string('numero')->nullable();
            $table->string('colonia');
            $table->integer('cp')->nullable();
            $table->string('ciudad');
            $table->string('estado')->nullable();
            $table->char('telefono');
            $table->char('ext')->nullable();
            $table->char('fax')->nullable();
            $table->char('celular')->nullable();
            $table->string('correo_electronico')->nullable();
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
        Schema::dropIfExists('cat_proveedores');
    }
}
