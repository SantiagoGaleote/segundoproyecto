<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $favoritos = [
            ['usuario_id' => 1, 'libro_id' => 1],
            ['usuario_id' => 2, 'libro_id' => 2],
        ];

        foreach ($favoritos as $data) {
            Favorito::create($data);
        }
    }
}
