<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TipoOfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_oferta')->insert([
            'descripcion' => '2X1',
            'estado' => 1,
        ]);   
        DB::table('estados')->insert([
            'descripcion' => '3X1',
            'estado' => 1,
        ]);
    }
}
