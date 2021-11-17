<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->string('codigo_pedido');
            $table->unsignedBigInteger('id_cliente');
            $table->datetime('fecha_pedido');
            $table->date('fecha_entrega');
            $table->time('hora_entrega');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_ciudad');
            $table->string('direccion_entrega');
            $table->string('destinatario');
            $table->double('total');
            $table->string('comentario');
            
            $table->foreign('id_estado')->references('id_estado')->on('estado_pedidos')->onDelete('cascade');
            $table->foreign('id_ciudad')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
