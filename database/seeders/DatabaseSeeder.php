<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EstadoSeeder::class,
            CiudadSeeder::class,
            TipoCategoriaSeeder::class,
            CategoriaSeeder::class,
            EstadoPedidoSeeder::class,
            TipoPagoSeeder::class,
            EstadoVentaSeeder::class,
            DescuentoSeeder::class,
            RoleTableSeeder::class,
            RoleUserSeeder::class,
            EmpresaSeeder::class,
            CuentaBancariaSeeder::class,
        ]);
    }
}
