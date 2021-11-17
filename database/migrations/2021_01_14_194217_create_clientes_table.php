<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('codigo_cliente')->unique();
            $table->string('razon_social');
            $table->string('rtn');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('sexo')->nullable();
            $table->string('direccion');
            $table->unsignedBigInteger('id_ciudad');
            $table->integer('tipo');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_usuario')->nullable();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ciudad')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
