<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:categorias,nombre',
        ]);

        return Categoria::create(['nombre' => $request->nombre]);
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->only('nombre'));

        return $categoria;
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return response()->json(['mensaje' => 'Categoría eliminada']);
    }
}
