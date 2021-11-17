<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComboDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_combo');
            $table->unsignedBigInteger('id_producto');
            $table->double('cantidad');
         
            $table->foreign('id_combo')->references('id_combo')->on('combos')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combo_detalles');
    }
}
