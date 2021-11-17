<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EstadoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_pedidos')->insert([
            'descripcion' => 'Pendiente de Confirmar',
            'porcentaje' => 10,
        ]);   
        DB::table('estado_pedidos')->insert([
            'descripcion' => 'En Proceso',
            'porcentaje' => 40,
        ]);
        DB::table('estado_pedidos')->insert([
            'descripcion' => 'Enviado',
            'porcentaje' => 80,
        ]);
        DB::table('estado_pedidos')->insert([
            'descripcion' => 'Entregado',
            'porcentaje' => 100,
        ]);
        DB::table('estado_pedidos')->insert([
            'descripcion' => 'Cancelado',
            'porcentaje' => 0,
        ]);
    }
}
