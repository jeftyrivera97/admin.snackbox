<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'ciudad' => 'La Ceiba',
            'departamento' => 'Atlantida',
            'id_estado' => 1,
        ]);
        DB::table('ciudades')->insert([
            'ciudad' => 'Jutiapa',
            'departamento' => 'Atlantida',
            'id_estado' => 1,
        ]);
        DB::table('ciudades')->insert([
            'ciudad' => 'El Porvenir',
            'departamento' => 'Atlantida',
            'id_estado' => 1,
        ]);
    }
}
