<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::with(['categoria', 'usuario'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'pdf_url' => 'nullable|url',
        ]);

        return Libro::create($request->all());
    }

    public function show($id)
    {
        return Libro::with(['categoria', 'usuario'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return $libro;
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return response()->json(['mensaje' => 'Libro eliminado']);
    }
}
