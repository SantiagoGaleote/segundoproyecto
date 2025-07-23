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
            ['Cien años de soledad', 'Gabriel García Márquez', 'https://www.gutenberg.org/files/1342/1342-pdf.pdf'],
            ['Don Quijote de la Mancha', 'Miguel de Cervantes', 'https://www.gutenberg.org/files/996/996-pdf.pdf'],
            ['Orgullo y prejuicio', 'Jane Austen', 'https://www.gutenberg.org/files/1342/1342-pdf.pdf'],
            ['Crimen y castigo', 'Fiódor Dostoyevski', 'https://www.gutenberg.org/files/2554/2554-pdf.pdf'],
            ['Moby Dick', 'Herman Melville', 'https://www.gutenberg.org/files/2701/2701-pdf.pdf'],
            ['1984', 'George Orwell', 'https://www.planetebook.com/free-ebooks/1984.pdf'],
            ['La Odisea', 'Homero', 'https://www.gutenberg.org/files/1727/1727-pdf.pdf'],
            ['El retrato de Dorian Gray', 'Oscar Wilde', 'https://www.gutenberg.org/files/174/174-pdf.pdf'],
            ['El arte de la guerra', 'Sun Tzu', 'https://www.gutenberg.org/files/132/132-pdf.pdf'],
            ['El príncipe', 'Maquiavelo', 'https://www.gutenberg.org/files/1232/1232-pdf.pdf'],
        ];

        for ($i = 0; $i < 50; $i++) {
            $libro = $librosBase[$i % count($librosBase)];

            Libro::create([
                'titulo' => $libro[0] . " #" . ($i + 1),
                'autor' => $libro[1],
                'pdf_url' => $libro[2],
                'usuario_id' => Usuario::inRandomOrder()->first()->id,
                'categoria_id' => Categoria::inRandomOrder()->first()->id,
            ]);
        }
    }  
}
