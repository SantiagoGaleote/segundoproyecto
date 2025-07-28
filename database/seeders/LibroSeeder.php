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
            ['titulo' => 'La odisea', 'autor' => 'Homero Simpson', 'categoria_id' => 1, 'descripcion' => 'Distopía política clasista', 'pdf_url' => '', 'img_url' => 'https://tse4.mm.bing.net/th/id/OIP.gZHgz-7uR7FxkLeRIdRsmgHaLz?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'Cien años de soledad', 'autor' => 'Gabriel García Márquez', 'categoria_id' => 2, 'descripcion' => 'Realismo mágico en Macondo', 'pdf_url' => '', 'img_url' => 'https://imagessl8.casadellibro.com/a/l/t0/08/9788497592208.jpg'],
            ['titulo' => 'El principito', 'autor' => 'Antoine de Saint-Exupéry', 'categoria_id' => 3, 'descripcion' => 'Fábula filosófica sobre la vida y la amistad', 'pdf_url' => '', 'img_url' => 'https://tse3.mm.bing.net/th/id/OIP.eLXINsQC8gg6I9xeQqI-UgHaKZ?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => '1984', 'autor' => 'George Orwell', 'categoria_id' => 4, 'descripcion' => 'Distopía sobre vigilancia y control social', 'pdf_url' => '', 'img_url' => 'https://tse4.mm.bing.net/th/id/OIP.mZ8lfUjtuU5CvVzBCcc9ygHaLH?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'Don Quijote de la Mancha', 'autor' => 'Miguel de Cervantes', 'categoria_id' => 5, 'descripcion' => 'Aventuras de un caballero idealista', 'pdf_url' => '', 'img_url' => 'https://i0.wp.com/www.globolibri.it/wp-content/uploads/2019/09/don-quijote-de-la-mancha-cervantes.jpg?fit=1200,1445&ssl=1'],
            ['titulo' => 'Rayuela', 'autor' => 'Julio Cortázar', 'categoria_id' => 2, 'descripcion' => 'Novela experimental sobre la vida y el amor', 'pdf_url' => '', 'img_url' => 'https://m.media-amazon.com/images/I/41UfZV4MqfL.jpg'],
            ['titulo' => 'Fahrenheit 451', 'autor' => 'Ray Bradbury', 'categoria_id' => 4, 'descripcion' => 'Sociedad donde los libros están prohibidos', 'pdf_url' => '', 'img_url' => 'https://www.estudioenescarlata.com/media/img/portadas/_visd_0001JPG01JGV.jpg'],
            ['titulo' => 'Crónica de una muerte anunciada', 'autor' => 'Gabriel García Márquez', 'categoria_id' => 2, 'descripcion' => 'Relato sobre un asesinato anunciado', 'pdf_url' => '', 'img_url' => 'https://tse4.mm.bing.net/th/id/OIP.OIhz9oeoJJgMWYe3uztQdwHaLQ?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'Pedro Páramo', 'autor' => 'Juan Rulfo', 'categoria_id' => 2, 'descripcion' => 'Novela mexicana de realismo mágico', 'pdf_url' => '', 'img_url' => 'https://cdn.kobo.com/book-images/c3be1579-3b38-4d00-bc68-0b8646603aa0/1200/1200/False/pedro-paramo-13.jpg'],
            ['titulo' => 'El túnel', 'autor' => 'Ernesto Sabato', 'categoria_id' => 3, 'descripcion' => 'Novela psicológica sobre obsesión y soledad', 'pdf_url' => '', 'img_url' => 'https://3.bp.blogspot.com/-M3YnYD-Ataw/VecIh7cWLLI/AAAAAAAAByk/bpB5Rwn5KTg/s1600/tunel.jpg'],
            ['titulo' => 'Orgullo y prejuicio', 'autor' => 'Jane Austen', 'categoria_id' => 5, 'descripcion' => 'Clásico sobre amor y sociedad inglesa', 'pdf_url' => '', 'img_url' => 'https://tse3.mm.bing.net/th/id/OIP.8cABIPJZA-1vTHOry3ADlwHaLr?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'Moby Dick', 'autor' => 'Herman Melville', 'categoria_id' => 5, 'descripcion' => 'Aventura marítima y obsesión', 'pdf_url' => '', 'img_url' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1669512309i/63849929.jpg'],
            ['titulo' => 'El retrato de Dorian Gray', 'autor' => 'Oscar Wilde', 'categoria_id' => 3, 'descripcion' => 'Novela sobre belleza y corrupción', 'pdf_url' => '', 'img_url' => 'https://tse3.mm.bing.net/th/id/OIP.-wiVTBI-aZGJOGUWQ1henAHaLZ?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'Los miserables', 'autor' => 'Victor Hugo', 'categoria_id' => 5, 'descripcion' => 'Drama social y redención', 'pdf_url' => '', 'img_url' => 'https://tse1.mm.bing.net/th/id/OIP.vneIfOXU9JluEvj2JJFQ4QHaKm?rs=1&pid=ImgDetMain&o=7&rm=3'],
            ['titulo' => 'El amor en los tiempos del cólera', 'autor' => 'Gabriel García Márquez', 'categoria_id' => 2, 'descripcion' => 'Historia de amor a través de los años', 'pdf_url' => '', 'img_url' => 'https://th.bing.com/th/id/R.f3cdf83ff35d77dc68584eb8577f123d?rik=r6OKId5zWGglCA&pid=ImgRaw&r=0'],
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
