<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Usuario;
use App\Models\Categoria;

class LibroSeeder extends Seeder
{
 public function run(): void
    {
        $librosBase = [
            ['titulo' => 'La odisea','autor' => 'Homero Simpson','categoria_id' => 1,'descripcion' => 'Distopía política clasista','pdf_url' => 'https://drive.google.com/file/d/1zsrQnwK_7Hevs-DLdwpl4HK5mgLi_txz/view?usp=drive_link','img_url' => 'https://www.isliada.org/static/images/2017/10/la-odisea-homero.jpg'],
        ];

        foreach ($librosBase as $index => $libro) {
            Libro::create([
                'titulo' => $libro['titulo'] . " #" . ($index + 1),
                'autor' => $libro['autor'],
                'descripcion' => $libro['descripcion'],
                'pdf_url' => $libro['pdf_url'],
                'img_url' => $libro['img_url'],
                'categoria_id' => $libro['categoria_id'],
            ]);
        }
    }  
}
