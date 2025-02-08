<?php

declare(strict_types=1);

namespace App\Exceptions\Tasks;

use App\Support\Enums\StatusCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskExpiredException extends Exception
{
    public function render(Request $request): Response
    {
        return response(
        [
            "message" => trans('exceptions.tasks.task_expired'),
        ],
        StatusCode::CONFLICT->value);
    }
}
