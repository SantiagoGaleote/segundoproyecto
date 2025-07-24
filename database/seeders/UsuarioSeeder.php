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
            ['nombre' => 'Roman Galeote', 'email' => 'romi@gmail.com', 'rol' => 'admin', 'password' => Hash::make('admin123')],
            ['nombre' => 'Juan Pérez', 'email' => 'juan@gmail.com', 'rol' => 'usuario', 'password' => Hash::make('123456')],
        ];
        foreach ($usuarios as $data) {
            Usuario::create($data);
        }
    }
}
