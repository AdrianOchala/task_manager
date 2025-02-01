<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\GetTokenController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('token', GetTokenController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('tasks', TaskController::class)->except('update');
});
