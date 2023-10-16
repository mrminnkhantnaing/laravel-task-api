<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Services\Auth\UserService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // user authentication
    public function login(UserLoginRequest $request)
    {
        return ResponseService::success(UserService::login($request), 'Successfully logged in.');
    }

    // user logout
    public function logout(Request $request)
    {
        return ResponseService::success(UserService::logout($request), 'Successfully logged out.');
    }
}
