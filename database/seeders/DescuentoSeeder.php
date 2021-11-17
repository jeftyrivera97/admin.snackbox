<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descuentos')->insert([
            'descripcion' => '5%',
            'valor' => 0.05,
            'id_estado' => 1,
        ]);   
        DB::table('descuentos')->insert([
            'descripcion' => '10%',
            'valor' => 0.10,
            'id_estado' => 1,
        ]);
        DB::table('descuentos')->insert([
            'descripcion' => '15%',
            'valor' => 0.15,
            'id_estado' => 1,
        ]);
        DB::table('descuentos')->insert([
            'descripcion' => '20%',
            'valor' => 0.20,
            'id_estado' => 1,
        ]);
        DB::table('descuentos')->insert([
            'descripcion' => '25%',
            'valor' => 0.25,
            'id_estado' => 1,
        ]);
        DB::table('descuentos')->insert([
            'descripcion' => '30%',
            'valor' => 0.30,
            'id_estado' => 1,
        ]);
    }
}
