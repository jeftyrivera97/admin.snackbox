<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'codigo_empresa' => '010551225555444',
            'descripcion' => "Decoraciones GS",
            'direccion' => 'La Ceiba, Atlantida',
            'telefono' => '9999-0000',
            'razon_social' => 'Juan Flores',
            'cai' => '055225-5555-55555',
            'correo' => 'decoracionesgs@gmail.com',
            'id_estado' => 1,
        ]);
    }
}
