<?php

namespace App\Http\Controllers\Tasks;

use App\Actions\Tasks\UpdateTaskPlannedAt;
use App\Data\Tasks\PlannedAtData;
use App\Http\Controllers\Controller;
use App\Http\Responses\EmptyResponse;
use App\Models\Task;

class UpdatePlannedAtTaskController extends Controller
{
    public function __invoke(PlannedAtData $data, string $hashId): EmptyResponse
    {
        new UpdateTaskPlannedAt(Task::byHashOrFail($hashId), $data)->execute();

        return new EmptyResponse();
    }
}
