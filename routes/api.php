<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\GetTokenController;
use App\Http\Controllers\Tasks\ActivateTaskController;
use App\Http\Controllers\Tasks\CancelTaskController;
use App\Http\Controllers\Tasks\FinishTaskController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\UpdateDueAtTaskController;
use App\Http\Controllers\Tasks\UpdatePlannedAtTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('token', GetTokenController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function (): void {
    Route::prefix('tasks/{id}')->group(function (): void {
        Route::patch('activate', ActivateTaskController::class)->name('tasks.activate');
        Route::patch('cancel', CancelTaskController::class)->name('tasks.cancel');
        Route::patch('finish', FinishTaskController::class)->name('tasks.finish');
        Route::patch('planned-at', UpdatePlannedAtTaskController::class)->name('tasks.update.planned_at');
        Route::patch('due-at', UpdateDueAtTaskController::class)->name('tasks.update.due_at');
    });
    Route::apiResource('tasks', TaskController::class);
});
