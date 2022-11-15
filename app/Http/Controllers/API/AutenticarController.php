<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccesoRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistroRequest;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    //Función que permite registrar usuarios a la api
    public function registro(RegistroRequest $request)
    {
        # Creamos un nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // Cancelo esto porque en el User Model puse una función para encryptar el password
        // $user->password = bcrypt($request-> password);
        $user->save();

        $user->roles()->attach($request->roles);

        return response()->json([
            'res' => true,
            'mensaje' => 'Usuario registrado correctamente',
        ], 200);
    }

    // Método que permite al usuario acceder a la api mediante sus credenciales
    public function acceso(AccesoRequest $request)
    {
        # code...
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'mensaje' => ['Usuario o contraseña incorrectos. Favor de verificar.'],
            ]);
        }
        // Almacenamos y creamos el token y lo almacenamos en texto plano
        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'token' => $token,
        ],200);
    }

    // Método que permite al usuario salir de la api
    public function cerrarSesion(Request $request)
    {
        # code...
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'res' => true,
            'mensaje' => 'Token eliminado correctamente',
        ],200);
    }
}
