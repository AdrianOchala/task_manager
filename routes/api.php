<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Resources\UserResource;
use App\Http\Responses\WrappedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', LoginController::class)->name('login');
Route::post('token', TokenController::class)->name('token');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('/user', function (Request $request) {
    return new WrappedResponse(new UserResource($request->user()));
})->middleware('auth:sanctum');
