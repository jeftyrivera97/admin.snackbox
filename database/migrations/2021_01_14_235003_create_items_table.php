<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('id_item');
            $table->string('titulo');
            $table->double('precio');
            $table->unsignedBigInteger('id_tipo');
            $table->string('ruta_imagen');
            $table->unsignedBigInteger('id_estado');


            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_categorias')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
