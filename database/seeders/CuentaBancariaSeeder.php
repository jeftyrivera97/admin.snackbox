<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CuentaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuenta_bancarias')->insert([
            'codigo_cuenta' => '010198742555',
            'banco' => 'Banco Atlantida',
            'titular' => 'Decoraciones GS',
            'id_estado' => 1,
        ]);
    }
}
