<?php

namespace App\Http\Controllers\Tasks;

use App\Actions\Tasks\Status\CancelTask;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use App\Models\Task;

class CancelTaskController extends Controller
{
    public function __invoke(string $hashId): EmptyResponse
    {
        new CancelTask(Task::byHashOrFail($hashId))->execute();

        return new EmptyResponse();
    }

}
