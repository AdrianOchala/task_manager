<?php

namespace App\Http\Controllers\Tasks;

use App\Actions\Tasks\UpdateTaskDueAt;
use App\Data\Tasks\DueAtData;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use App\Models\Task;

class UpdateDueAtTaskController extends Controller
{
    public function __invoke(DueAtData $data, string $hashId): EmptyResponse
    {
        new UpdateTaskDueAt(Task::byHashOrFail($hashId), $data)->execute();

        return new EmptyResponse();
    }
}
