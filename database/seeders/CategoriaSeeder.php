<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Novela', 'Ciencia Ficcion', 'Fantasia', 'Historia', 'Autoayuda', 'Ciencia', 'Terror', 'Infantil', 'Educacion', 'Clasicos'];

        foreach ($categorias as $nombre) {
            Categoria::create(['nombre' => $nombre]);
        }
    }
}
