<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Novela', 'Ciencia Ficción', 'Fantasía', 'Historia', 'Autoayuda', 'Ciencia', 'Terror', 'Infantil', 'Educación', 'Clásicos'];

        foreach ($categorias as $nombre) {
            Categoria::create(['nombre' => $nombre]);
        }
    }
}
