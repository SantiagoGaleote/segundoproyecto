<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    $this->call([
        UsuarioSeeder::class,
        CategoriaSeeder::class,
        LibroSeeder::class,
    ]);

        // Puedes agregar más seeders aquí si es necesario
        // $this->call(AnotherSeeder::class);
    }
}
