<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function loginApi(Request $request)
    {
       $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($loginData)) {
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'data' => Auth::user(),
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Username atau password salah',
        ], 401);
    } 
    
    public function registerApi(Request $request)
    {
        $registerData = $request->validate([
            'name' => 'required|max:55',
            'noTelp' => 'required|max:55',
            'role' => 'required|max:55',
            'rw' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $registerData['password'] = bcrypt($request->password);

        $user = User::create($registerData);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'data' => $user,
            'token' => $token,
        ], 200);
    }
}
