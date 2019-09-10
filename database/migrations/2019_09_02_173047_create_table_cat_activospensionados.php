<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatActivospensionados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_actpen', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('actpen', ['ACTIVO', 'PENSIONADO']);           
            $table->datetime('fecha_ingreso')->nullable();
            $table->integer('numero');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('nombre')->nullable();
            $table->datetime('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['FEMENINO', 'MASCULINO']); 
            $table->char('rfc',50)->nullable(); 
            $table->char('curp',50)->nullable();
            $table->char('nss',50)->nullable();
            $table->char('ine',50)->nullable();
            $table->string('calle')->nullable();
            $table->string('no_exterior')->nullable();
            $table->string('no_interior')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('cp')->nullable();
            $table->char('telefono_fijo',15)->nullable();
            $table->char('telefono_celular',15)->nullable();
            $table->string('correo_electronico_personal')->nullable();
            $table->string('correo_electronico_institucional')->nullable();
            $table->text('comentario')->nullable();
            $table->integer('origen')->nullable();
            $table->enum('actpen_origen', ['NINGUNO','ACTIVO', 'PENSIONADO']); 
            $table->enum('pagosn', ['ACTIVOS', 'FALLECIDOS']);  
            $table->string('profesion')->nullable();
            $table->string('institucion')->nullable();
            $table->boolean('contrato')->default(0);
            $table->enum('tipo_credencial', ['INICIAL', 'RENOVACION']);  
            $table->integer('numero_credencial')->nullable();
            $table->datetime('fecha_expedicion')->nullable();
            $table->datetime('fecha_capturada')->nullable();
            $table->datetime('fecha_ajustada')->nullable();
            $table->datetime('fecha_reingreso')->nullable();
            $table->text('notas_titulares')->nullable();
            $table->text('comentarios_homonimia')->nullable();
            $table->string('foto')->nullable();
            $table->string('firma')->nullable();


            
           /* $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id')->on('cat_estados');

            $table->integer('id_municipio')->unsigned();
            $table->foreign('id_municipio')->references('id')->on('cat_municipios');

            $table->integer('id_localidad')->unsigned();
            $table->foreign('id_localidad')->references('id')->on('cat_localidades');*/

            $table->integer('id_estadocivil')->unsigned()->nullable();
            $table->foreign('id_estadocivil')->references('id')->on('cat_estado_civil');

            $table->integer('id_situacion')->unsigned()->nullable();
            $table->foreign('id_situacion')->references('id')->on('cat_situaciones');

            $table->integer('id_vivienda')->unsigned()->nullable();
            $table->foreign('id_vivienda')->references('id')->on('cat_viviendas');

            $table->integer('id_tipopension')->unsigned()->nullable();
            $table->foreign('id_tipopension')->references('id')->on('cat_tipos_pensiones');


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
        Schema::dropIfExists('cat_actpen');
    }
}
