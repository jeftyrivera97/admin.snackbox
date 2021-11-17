<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->id('id_producto');
            $table->string('codigo_producto')->unique();
            $table->string('titulo');
            $table->string('descripcion');
            $table->double('precio');
            $table->string('ruta_imagen');
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('id_estado');
          
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
