<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->string('codigo_factura')->unique();
            $table->unsignedBigInteger('id_folio');
            $table->unsignedBigInteger('id_venta');
            $table->datetime('fecha');
            $table->double('descuentos');
            $table->double('gravado15');
            $table->double('gravado18');
            $table->double('impuesto15');
            $table->double('impuesto18');
            $table->double('total');
            $table->string('total_letras')->nullable();
            $table->double('tipo');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
            $table->foreign('id_folio')->references('id_folio')->on('folio_facturas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
