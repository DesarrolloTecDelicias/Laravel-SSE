<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;

class CareerController extends Controller
{
    public function getAll(Request $request)
    {
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
            return Career::all();
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }

    public function getById(Request $request, $id)
    {
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
            return Career::findOrFail($id);
        } else {
            return response()->json([
                'message' => 'No cuentas con los permisos para realizar esta consulta, contacte al administrador.'
            ], 401);
        }
    }
}
