<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request): JsonResponse
    {
        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
       return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer'
       ],201);
    }

    public function login(LoginFormRequest $request)
    {
        if(!\Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ],401);
        }

        $user =User::where('email',$request->get('email'))->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ],201);
    }
}
