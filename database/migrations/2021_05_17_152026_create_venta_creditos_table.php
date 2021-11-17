<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_creditos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_venta');
            $table->double('saldo');
            $table->integer('estado');
           
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_creditos');
    }
}
