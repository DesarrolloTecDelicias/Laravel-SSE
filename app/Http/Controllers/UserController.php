<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;
class UserController extends Controller
{
    public function profile(){
        return view('profile.show');
    }

    public function login(Request $request){
        $user = User::where([
            ['email', $request->email],
        ])->first();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no existe.'
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        if ($user->role == Constants::ROLE['Support'] || $user->role == Constants::ROLE['Administrator']) {
            return response()->json([
                'message' => 'Bienvenido al sistema.',
                'token' => $user->createToken('authToken')->plainTextToken
            ], 200);
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }
}
