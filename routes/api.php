<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\Tasks\ActivateTaskController;
use App\Http\Controllers\Tasks\CancelTaskController;
use App\Http\Controllers\Tasks\FinishTaskController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\UpdateDueAtTaskController;
use App\Http\Controllers\Tasks\UpdatePlannedAtTaskController;
use App\Http\Resources\UserResource;
use App\Http\Responses\WrappedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', LoginController::class)->name('login');
Route::post('token', TokenController::class)->name('token');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
    Route::prefix('tasks/{id}')->group(function (): void {
        Route::patch('activate', ActivateTaskController::class)->name('tasks.activate');
        Route::patch('cancel', CancelTaskController::class)->name('tasks.cancel');
        Route::patch('finish', FinishTaskController::class)->name('tasks.finish');
        Route::patch('planned-at', UpdatePlannedAtTaskController::class)->name('tasks.update.planned_at');
        Route::patch('due-at', UpdateDueAtTaskController::class)->name('tasks.update.due_at');
    });
    Route::apiResource('tasks', TaskController::class);
});

Route::get('/user', function (Request $request) {
    return new WrappedResponse(new UserResource($request->user()));
})->middleware('auth:sanctum');
