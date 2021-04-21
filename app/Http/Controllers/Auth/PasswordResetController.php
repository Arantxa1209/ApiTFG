<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\PasswordResetRequest;
use Illuminate\Support\Str;

use App\Notifications\PasswordResetSuccess;

class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Este email no esta registrado en nuestra base de datos'
            ], 409);
        } else {
            $passwordReset = PasswordReset::updateOrCreate(
                [
                    'email' => $user->email,
                    'token' => Str::random(60),
                    'created_at' => Carbon::now()
                ]
            );
        }

        if ($user && $passwordReset) {
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        }
        return response()->json([
            'message' => 'Hemos enviado por correo electrónico el enlace para restablecer su contraseña.'
        ], 201);
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find( $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'Link invalido.'
            ], 404);

        if (Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'Ha pasado mucho tiempo, vuelve a solicitar el cambio de contraseña.'
            ], 404);
        }
        return response()->json($passwordReset, 201);
    }
    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where('token', $request->token)->first();
        if (!$passwordReset){
            return response()->json([
                'message' => 'Ha pasado mucho tiempo, vuelve a solicitar el cambio de contraseña.'
            ], 404);
        }
            
        $user = User::where('email', $request->email)->first();
        if (!$user){
            return response()->json([
                'message' => 'El email no existe en nuestra base de datos, vuelve a intentarlo'
            ], 404);
        }
            
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}
