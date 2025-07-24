<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    // Obtener todos los favoritos con relaciones
    public function index(): JsonResponse
    {
        $favoritos = Favorito::with(['usuario', 'libro'])->get();
        return response()->json($favoritos);
    }

    // Crear un nuevo favorito
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'libro_id' => 'required|exists:libros,id',
        ]);

        // Evitar duplicados
        $existe = Favorito::where('usuario_id', $request->usuario_id)
                          ->where('libro_id', $request->libro_id)
                          ->first();

        if ($existe) {
            return response()->json(['mensaje' => 'Este libro ya está en favoritos'], 409);
        }

        $favorito = Favorito::create($request->all());
        return response()->json($favorito, 201);
    }

    // Mostrar un favorito por ID
    public function show($id): JsonResponse
    {
        $favorito = Favorito::with(['usuario', 'libro'])->find($id);

        if (!$favorito) {
            return response()->json(['mensaje' => 'Favorito no encontrado'], 404);
        }

        return response()->json($favorito);
    }

    // Eliminar un favorito
    public function destroy($id): JsonResponse
    {
        $favorito = Favorito::find($id);

        if (!$favorito) {
            return response()->json(['mensaje' => 'Favorito no encontrado'], 404);
        }

        $favorito->delete();
        return response()->json(['mensaje' => 'Favorito eliminado']);
    }
}
