<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRchEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rch_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_personal')->unique();
            $table->datetime('fecha_ingreso')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre')->nullable();
            $table->datetime('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['FEMENINO', 'MASCULINO']);
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('nss')->nullable();
            $table->string('calle')->nullable();
            $table->string('no_exterior')->nullable();
            $table->string('no_interior')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('cp')->nullable();
            $table->char('telefono_fijo',10)->nullable();
            $table->char('telefono_celular',10)->nullable();
            $table->string('correo_electronico')->nullable();
            $table->boolean('estatus')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rch_empleados');
    }
}


