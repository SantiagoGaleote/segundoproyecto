<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LibroController extends Controller
{
    // Obtener todos los libros con sus relaciones
    public function index(): JsonResponse
    {
        $libros = Libro::with(['categoria', 'usuario'])->get();
        return response()->json($libros);
    }

    // Crear un nuevo libro
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'pdf_url' => 'nullable|url',
            'img_url' => 'nullable|url',
        ]);

        $libro = Libro::create($request->all());
        return response()->json($libro, 201);
    }

    // Mostrar un libro por ID con relaciones
    public function show($id): JsonResponse
    {
        $libro = Libro::with(['categoria', 'usuario'])->find($id);

        if (!$libro) {
            return response()->json(['mensaje' => 'Libro no encontrado'], 404);
        }

        return response()->json($libro);
    }

    // Actualizar un libro
    public function update(Request $request, $id): JsonResponse
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['mensaje' => 'Libro no encontrado'], 404);
        }

        $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'autor' => 'sometimes|required|string|max:255',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'pdf_url' => 'nullable|url',
            'img_url' => 'nullable|url',
        ]);

        $libro->update($request->all());
        return response()->json($libro);
    }

    // Eliminar un libro
    public function destroy($id): JsonResponse
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['mensaje' => 'Libro no encontrado'], 404);
        }

        $libro->delete();
        return response()->json(['mensaje' => 'Libro eliminado correctamente']);
    }
}
