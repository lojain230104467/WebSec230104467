<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;

Route::post('login', [UsersController::class, 'login']);

Route::middleware(['auth:api', 'throttle:60,1'])->group(function () {
    Route::get('/users', [UsersController::class, 'users']);
    Route::get('/logout', [UsersController::class, 'logout']);
});
