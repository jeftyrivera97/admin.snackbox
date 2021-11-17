<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EstadoVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_ventas')->insert([
            'descripcion' => 'Pagado',
        ]); 
        DB::table('estado_ventas')->insert([
            'descripcion' => 'Por Pagar',
        ]);
        DB::table('estado_ventas')->insert([
            'descripcion' => 'Cancelado',
        ]);  
    }
}
