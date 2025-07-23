<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

        return Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
            'password' => 'sometimes|required|min:6',
        ]);

        $usuario->update([
            'nombre' => $request->nombre ?? $usuario->nombre,
            'email' => $request->email ?? $usuario->email,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
        ]);

        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}
