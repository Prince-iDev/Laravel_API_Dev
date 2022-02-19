<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'error'=>true,
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'error'=>false,
           'access_token' => $token,
           'token_type' => 'Bearer',
        ]);

    }
}
