<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('clientes')->insert([
            'codigo_cliente' => '0101199800934',
            'rtn' => '0000-0000-0000000',
            'razon_social' => 'CONSUMIDOR FINAL',
            'nombre' => 'Juan',
            'apellido' => 'Flores',
            'sexo' => 'Masculino',
            'id_ciudad' => 1,
            'direccion' => 'La Ceiba, Atlantida',
            'id_estado' => 1,
            'tipo' => 1,
            'telefono' => '99971235',
            'id_usuario' => 4,
        ]);  

        DB::table('clientes')->insert([
            'codigo_cliente' => '0101199800935',
            'rtn' => '0000-0000-0000000',
            'razon_social' => 'CONSUMIDOR FINAL',
            'nombre' => 'Jeffry',
            'apellido' => 'Rivera',
            'sexo' => 'Masculino',
            'id_ciudad' => 1,
            'direccion' => 'La Ceiba, Atlantida',
            'id_estado' => 1,
            'tipo' => 1,
            'telefono' => '99971234',
            'id_usuario' => 5,
        ]);  

        DB::table('clientes')->insert([
            'codigo_cliente' => '0101199800936',
            'rtn' => '0000-0000-0000000',
            'razon_social' => 'CONSUMIDOR FINAL',
            'nombre' => 'Fernando',
            'apellido' => 'Rivera',
            'sexo' => 'Masculino',
            'id_ciudad' => 1,
            'direccion' => 'La Ceiba, Atlantida',
            'id_estado' => 1,
            'tipo' => 1,
            'telefono' => '99971234',
            'id_usuario' => 6,
        ]); 

    }
}
