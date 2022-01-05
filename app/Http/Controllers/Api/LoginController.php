<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'password' => 'required|min:6',
            'username' => 'required',
        ]);

        if (! $token = auth('api')->attempt($data)) {
            return response()->json(['error' => 'Unauthorized, please check your credential again.'], 401);
        }

        return response()->json([
            'user' => auth('api')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
