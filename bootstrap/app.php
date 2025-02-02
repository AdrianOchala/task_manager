<?php

use App\Support\Enums\StatusCode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Spatie\ModelStates\Exceptions\TransitionNotAllowed;
use Spatie\ModelStates\Exceptions\TransitionNotFound;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (TransitionNotFound $e, Request $request) {
            return response(
                [
                    "message" => trans('exceptions.tasks.transition_not_found'),
                ],
                StatusCode::CONFLICT->value);
        })
        ->render(function (TransitionNotAllowed $e, Request $request) {
            return response(
                [
                    "message" => trans('exceptions.tasks.transition_not_allowed'),
                ],
                StatusCode::CONFLICT->value);
        });
    })->create();
