<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ComentarioController extends Controller
{
    // Mostrar todos los comentarios con relaciones
    public function index(): JsonResponse
    {
        $comentarios = Comentario::with(['usuario', 'libro'])->get();
        return response()->json($comentarios);
    }

    // Crear un nuevo comentario
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'contenido' => 'required|string|max:1000',
        ]);

        $comentario = Comentario::create($request->all());
        return response()->json($comentario, 201);
    }

    // Mostrar un comentario por ID
    public function show($id): JsonResponse
    {
        $comentario = Comentario::with(['usuario', 'libro'])->find($id);

        if (!$comentario) {
            return response()->json(['mensaje' => 'Comentario no encontrado'], 404);
        }

        return response()->json($comentario);
    }

    // Actualizar un comentario
    public function update(Request $request, $id): JsonResponse
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['mensaje' => 'Comentario no encontrado'], 404);
        }

        $request->validate([
            'contenido' => 'sometimes|required|string|max:1000',
            'libro_id' => 'sometimes|required|exists:libros,id',
            'usuario_id' => 'sometimes|required|exists:usuarios,id',
        ]);

        $comentario->update($request->all());
        return response()->json($comentario);
    }

    // Eliminar un comentario
    public function destroy($id): JsonResponse
    {
        $comentario = Comentario::find($id);

        if (!$comentario) {
            return response()->json(['mensaje' => 'Comentario no encontrado'], 404);
        }

        $comentario->delete();
        return response()->json(['mensaje' => 'Comentario eliminado']);
    }
}
