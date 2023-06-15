<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    // Método para mostrar el formulario de restablecimiento de contraseña
    public function showResetForm(Request $request, $token)
    {
        // Aquí puedes personalizar la respuesta JSON que devuelves a Angular si es necesario
        return response()->json([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Método para restablecer la contraseña
    public function reset(Request $request)
    {

        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->update([
                'password' => $password
            ]);
        });

        if ($response == Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Contraseña restablecida exitosamente'], 200);
        } elseif ($response == Password::INVALID_TOKEN) {
            return response()->json(['error' => 'El token de restablecimiento de contraseña es inválido'], 400);
        } elseif ($response == Password::INVALID_USER) {
            return response()->json(['error' => 'No se encontró un usuario con esa dirección de correo electrónico'], 400);
        } elseif ($response == 'password') {
            return response()->json(['error' => 'La contraseña debe cumplir los requisitos establecidos'], 400);
        } else {
            return response()->json(['error' => 'No se pudo restablecer la contraseña'], 400);
        }
    }

    // Método para obtener las reglas de validación para restablecer la contraseña
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    // Método para obtener los mensajes de error de validación
    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }

    // Método para restablecer la contraseña del usuario
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
}
