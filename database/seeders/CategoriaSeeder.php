<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'descripcion' => 'Popular',
            'id_estado' => 1,
            'id_tipo' => 1,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Tendencia',
            'id_estado' => 1,
            'id_tipo' => 1,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Comidas',
            'ruta_imagen' => 'img/categorias/comidas.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Postres',
            'ruta_imagen' => 'img/categorias/postres.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Snacks',
            'ruta_imagen' => 'img/categorias/snacks.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Galletas',
            'ruta_imagen' => 'img/categorias/galletas.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Dulces',
            'ruta_imagen' => 'img/categorias/dulces.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Frutas',
            'ruta_imagen' => 'img/categorias/frutas.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Bebidas',
            'ruta_imagen' => 'img/categorias/bebidas.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Churros',
            'ruta_imagen' => 'img/categorias/churros.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
        DB::table('categorias')->insert([
            'descripcion' => 'Globos',
            'ruta_imagen' => 'img/categorias/globos.png',
            'id_estado' => 1,
            'id_tipo' => 2,
        ]);
    }
}
