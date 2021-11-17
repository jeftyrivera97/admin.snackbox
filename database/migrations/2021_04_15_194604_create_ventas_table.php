<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->datetime('fecha');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('tipo_pago');
            $table->double('descuento')->nullable();
            $table->double('total');
         
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('tipo_pago')->references('id_tipo')->on('tipo_pagos');
            $table->foreign('id_estado')->references('id_estado')->on('estado_ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
