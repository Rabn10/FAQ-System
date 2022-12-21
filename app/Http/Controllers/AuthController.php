<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['status' => 1, 'token' => $token, 'id' => Auth::id()])->header('Authorization', $token);
            }
            return response()->json(['error' => 'login_error'], 401);
             
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
