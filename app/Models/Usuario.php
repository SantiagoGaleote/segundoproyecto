<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory,
        Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación: Un usuario tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

}
