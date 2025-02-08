<?php

namespace App\Http\Controllers\Tasks;

use App\Actions\Tasks\Status\FinishTask;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use App\Models\Task;

class FinishTaskController extends Controller
{
    public function __invoke(string $hashId): EmptyResponse
    {
        new FinishTask(Task::byHashOrFail($hashId))->execute();

        return new EmptyResponse();
    }

}
