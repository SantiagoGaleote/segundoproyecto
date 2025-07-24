<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FavoritoController;

// 🔹 USUARIOS
Route::get('/usuarios', [UsuarioController::class, 'index']);           
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);       
Route::post('/usuarios', [UsuarioController::class, 'store']);          
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);     
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); 

// 🔹 CATEGORÍAS
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

// 🔹 LIBROS
Route::get('/libros', [LibroController::class, 'index']);
Route::get('/libros/{id}', [LibroController::class, 'show']);
Route::post('/libros', [LibroController::class, 'store']);
Route::put('/libros/{id}', [LibroController::class, 'update']);
Route::delete('/libros/{id}', [LibroController::class, 'destroy']);

// 🔹 COMENTARIOS
Route::get('/comentarios', [ComentarioController::class, 'index']);
Route::get('/comentarios/{id}', [ComentarioController::class, 'show']);
Route::post('/comentarios', [ComentarioController::class, 'store']);
Route::put('/comentarios/{id}', [ComentarioController::class, 'update']);
Route::delete('/comentarios/{id}', [ComentarioController::class, 'destroy']);

// 🔹 FAVORITOS
Route::get('/favoritos', [FavoritoController::class, 'index']);
Route::get('/favoritos/{id}', [FavoritoController::class, 'show']);
Route::post('/favoritos', [FavoritoController::class, 'store']);
Route::put('/favoritos/{id}', [FavoritoController::class, 'update']); // opcional si permites editar favoritos
Route::delete('/favoritos/{id}', [FavoritoController::class, 'destroy']);

// Obtener favoritos de un usuario
Route::get('/usuarios/{id}/favoritos', [FavoritoController::class, 'porUsuario']);

// Obtener comentarios de un libro
Route::get('/libros/{id}/comentarios', [ComentarioController::class, 'porLibro']);