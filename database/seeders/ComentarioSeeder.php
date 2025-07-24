<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $comentarios = [
            ['libro_id' => 1, 'usuario_id' => 2, 'contenido' => 'Excelente libro, me encantó.'],
        ];

        foreach ($comentarios as $data) {
            Comentario::create($data);
        }
    }
}
