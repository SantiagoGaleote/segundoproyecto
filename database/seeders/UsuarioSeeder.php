<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            ['nombre' => 'Ana Gómez', 'email' => 'ana@example.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Luis Torres', 'email' => 'luis@example.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Carmen Ruiz', 'email' => 'carmen@example.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Pedro Márquez', 'email' => 'pedro@example.com', 'password' => Hash::make('123456')],
            ['nombre' => 'Sofía Delgado', 'email' => 'sofia@example.com', 'password' => Hash::make('123456')],
        ];

        foreach ($usuarios as $data) {
            Usuario::create($data);
        }
    }
}
