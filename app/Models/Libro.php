<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    /** @use HasFactory<\Database\Factories\LibrosFactory> */
    use HasFactory;

     protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'autor',
        'usuario_id',
        'categoria_id',
        'pdf_url',
    ];

    // Relación: Un libro pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación: Un libro pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
