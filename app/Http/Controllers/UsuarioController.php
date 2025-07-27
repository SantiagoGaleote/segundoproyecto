<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index(): JsonResponse
    {
        return response()->json(Usuario::all());
    }

    // Crear nuevo usuario
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'required|email|unique:usuarios,email',
                'password' => 'required|string|min:6',
                'rol' => 'nullable|string|in:admin,usuario',
            ]);

            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'rol' => $request->rol ?? 'usuario',
                'password' => Hash::make($request->password),
            ]);

            // Enviar email de bienvenida
            try {
                Mail::to($usuario->email)->send(new WelcomeEmail($usuario));
                \Log::info('Email enviado a: ' . $usuario->email);
            } catch (\Exception $e) {
                \Log::error('Error al enviar email: ' . $e->getMessage());
            }

            return response()->json([
                'usuario' => $usuario,
                'message' => 'Usuario registrado exitosamente'
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error en store: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al registrar usuario: ' . $e->getMessage()
            ], 500);
        }
    }

    // Mostrar un usuario por ID
    public function show($id): JsonResponse
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, $id): JsonResponse
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
            'password' => 'sometimes|required|string|min:6',
            'rol' => 'sometimes|in:admin,usuario',
        ]);

        $usuario->update([
            'nombre' => $request->nombre ?? $usuario->nombre,
            'email' => $request->email ?? $usuario->email,
            'rol' => $request->rol ?? $usuario->rol,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
        ]);

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id): JsonResponse
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado correctamente']);
    }
}
