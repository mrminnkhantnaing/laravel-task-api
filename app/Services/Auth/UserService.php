<?php

namespace App\Services\Auth;

use App\Exceptions\CustomException;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // user authentication
    public static function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password))
            throw new CustomException('The provided credentials are incorrect.');

        $token = $user->createToken($user->email)->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token,
        ];

        return $data;
    }

    // user logout
    public static function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
