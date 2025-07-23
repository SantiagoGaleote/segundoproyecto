<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

// 🔹 USUARIOS
Route::get('/usuarios', [UsuarioController::class, 'index']);           // Obtener todos
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);       // Obtener uno
Route::post('/usuarios', [UsuarioController::class, 'store']);          // Crear
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);     // Actualizar
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Eliminar

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
