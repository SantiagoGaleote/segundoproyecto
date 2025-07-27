<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    UsuarioController,
    LibroController,
    CategoriaController,
    ComentarioController,
    FavoritoController
};

/**
 * Rutas públicas
 */
Route::post('register', [AuthController::class, 'register']);
Route::post('login',    [AuthController::class, 'login']);
Route::get('/test-mail', function() {
    \Log::info('Entró a ruta test-mail');
    Mail::raw('Correo de prueba', function($msg) {
        $msg->to('tu_correo@gmail.com')->subject('Prueba Laravel');
    });
    \Log::info('Después de Mail::raw');
    return response()->json(['ok' => true]);
});
Route::post('usuarios', [UsuarioController::class, 'store']);

/**
 * Probar middleware de rol
 */


/**
 * Rutas protegidas
 */
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('logout', [AuthController::class, 'logout']);

    // Usuarios (autenticado)
    Route::get('usuarios/{id}',  [UsuarioController::class, 'show'])->whereNumber('id');
    Route::put('usuarios/{id}',  [UsuarioController::class, 'update'])->whereNumber('id');

    /**
     * Admin + Usuario
     */
    Route::middleware('rol:admin,usuario')->group(function () {

        // Libros
        Route::get('libros',           [LibroController::class, 'index']);
        Route::get('libros/{id}',      [LibroController::class, 'show'])->whereNumber('id');
        Route::get('libros/{id}/comentarios', [ComentarioController::class, 'porLibro'])->whereNumber('id');

        // Comentarios y favoritos
        Route::apiResource('comentarios', ComentarioController::class);
        Route::apiResource('favoritos',   FavoritoController::class);
        Route::get('usuarios/{id}/favoritos', [FavoritoController::class, 'porUsuario'])->whereNumber('id');
    });

    /**
     * Solo administradores
     */
    

    Route::middleware('rol:admin')->group(function () {

        // Usuarios
        Route::get('usuarios',              [UsuarioController::class, 'index']);
        Route::delete('usuarios/{id}',      [UsuarioController::class, 'destroy'])->whereNumber('id');

        // Libros
        Route::post('libros',               [LibroController::class, 'store']);
        Route::put('libros/{id}',           [LibroController::class, 'update'])->whereNumber('id');
        Route::delete('libros/{id}',        [LibroController::class, 'destroy'])->whereNumber('id');

        // Categorías
        Route::apiResource('categorias', CategoriaController::class);
    });
});

/**
 * Fallback para rutas no encontradas
 */
Route::fallback(function () {
    return response()->json(['message' => 'Endpoint no encontrado.'], 404);
});
