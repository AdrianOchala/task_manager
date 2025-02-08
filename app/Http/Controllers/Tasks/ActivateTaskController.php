<?php

namespace App\Http\Controllers\Tasks;

use App\Actions\Tasks\Status\ActivateTask;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use App\Models\Task;

class ActivateTaskController extends Controller
{
    public function __invoke(string $hashId): EmptyResponse
    {
        new ActivateTask(Task::byHashOrFail($hashId))->execute();

        return new EmptyResponse();
    }

}
