<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Domain\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [UserController::class, 'login'])->withoutMiddleware('auth:sanctum');
        Route::post('/logout', [UserController::class, 'logout']);
    });

    Route::apiResource('/tasks', TaskController::class);
});
