<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatCuentasContables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_cuentas_contables', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cta',4);
            $table->char('scta',4);
            $table->char('sscta',4);
            $table->string('nombre');
            $table->string('ctaarmo')->nullable();
            $table->string('nomarmo')->nullable();
            $table->char('grupo',1)->nullable();
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
        Schema::dropIfExists('cat_cuentas_contables');
    }
}

