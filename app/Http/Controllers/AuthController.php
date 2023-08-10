<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function store(LoginRequest $request){
        if (!Auth::attempt($request->only('email','password'))) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')]
            ]);
        }

        $user =  User::where('email', $request['email'])->firstOrFail();

        $plainTextToken = $user->createToken(
            'access_token',
        )->plainTextToken;

        return response()->json([
            'id' => $user->id,
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    public function destroy(User $user){
        auth()->user()->tokens()->delete();
        return response()->json([
            "message" => "Cerro sesión con éxito",
        ]);
    }
}
