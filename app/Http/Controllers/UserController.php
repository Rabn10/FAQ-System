<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = $request->get('password');
            $user->save();
            return response()->json([
                'status' => 1,
                'message' => $user
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
