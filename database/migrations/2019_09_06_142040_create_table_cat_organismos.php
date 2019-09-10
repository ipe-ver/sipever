<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatOrganismos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_organismos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clave');
            $table->enum('tipo', ['AYUNTAMIENTO', 'DEPENDENCIA']); 
            $table->string('nombre');
            $table->string('titular')->nullable();
            $table->string('puesto')->nullable();
            $table->string('telefono')->nullable();
            $table->char('orgtab',3)->nullable();
            $table->datetime('fecha_act_nomina')->nullable();
            $table->datetime('fecha_incre_pers_conf')->nullable();
            $table->datetime('fecha_incre_pers_base')->nullable();
            $table->boolean('porc_cert_pers_conf')->default(0);
            $table->boolean('porc_cert_pers_base')->default(0);
            $table->enum('comprobantes', ['NINGUNO','C', 'M']); 
            $table->enum('conveniosfp', ['NINGUNO','N']); 
            $table->string('referencia')->nullable();
            $table->string('destinatario')->nullable();
            $table->string('cargo')->nullable();
            $table->string('complemento')->nullable();
            $table->string('calle')->nullable();
            $table->string('no_exterior')->nullable();
            $table->string('no_interior')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('cp')->nullable();
            $table->string('atentamente')->nullable();
            $table->string('cargo2')->nullable();
            $table->boolean('estatus')->default(1);


           // $table->integer('id_estado')->unsigned()->nullable();
            //$table->foreign('id_estado')->references('id')->on('cat_estados');

            //$table->integer('id_municipio')->unsigned()->nullable();
            //$table->foreign('id_municipio')->references('id')->on('cat_municipios');

            //$table->integer('id_localidad')->unsigned()->nullable();
            //$table->foreign('id_localidad')->references('id')->on('cat_localidades');


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
        Schema::dropIfExists('cat_organismos');
    }
}
