<?php

namespace App\Services\Auth;

use App\Exceptions\CustomException;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserService
{
    // user authentication
    public static function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password))
            throw new CustomException('The provided credentials are incorrect.', 422);

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
        $token = $request->user()->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }

        return true;
    }
}
