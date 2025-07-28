<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class AuthController extends Controller
{
    public function register(Request $request)
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
        }

        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'usuario' => $usuario,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['mensaje' => 'Sesión cerrada']);
    }
}

