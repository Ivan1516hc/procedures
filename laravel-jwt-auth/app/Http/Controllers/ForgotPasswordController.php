<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Método para enviar el correo electrónico de restablecimiento de contraseña
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->get('email'))->first();

        // Eliminar el token existente si existe
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        // Generar un nuevo token y guardarlo en la tabla password_reset_tokens
        $token = Password::getRepository()->create($user);



        // // Guardar el token en la tabla password_reset_tokens sin enviar el correo electrónico
        // DB::table('password_reset_tokens')->insert([
        //     'email' => $request->email,
        //     'token' => $token,
        //     'created_at' => now()
        // ]);
        if ($token) {
            // Obtener la dirección de correo electrónico del usuario
            $email = $request->email;

            // Obtener el nombre del usuario (si está disponible)
            $user = User::where('email', $email)->first();
            $name = $user ? $user->name : '';

            // Generar la URL de restablecimiento de contraseña con el token
            $resetUrl = url(config('app.url') . route('password.reset', [
                'token' => $token,
                'email' => $email
            ], false));

            // Enviar el correo electrónico utilizando la vista personalizada
            Mail::send('emails.reset-password', [
                'name' => $name,
                'resetUrl' => $resetUrl
            ], function (Message $message) use ($email) {
                $message->to($email)
                    ->subject('Restablecimiento de Contraseña');
            });

            return response()->json(['message' => 'Correo electrónico de restablecimiento de contraseña enviado'], 200);
        } else {
            return response()->json(['message' => 'No se pudo enviar el correo electrónico de restablecimiento de contraseña'], 400);
        }
    }

    // Método para obtener la instancia del Password Broker
    public function broker()
    {
        return Password::broker();
    }
}
