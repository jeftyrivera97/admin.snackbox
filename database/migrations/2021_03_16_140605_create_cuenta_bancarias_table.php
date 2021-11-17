<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_bancarias', function (Blueprint $table) {
            $table->id('id_cuenta');
            $table->string('codigo_cuenta')->unique();
            $table->string('banco');
            $table->string('titular');
            $table->unsignedBigInteger('id_estado');

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
        Schema::dropIfExists('cuentas');
    }
}
