<?php

declare(strict_types=1);

namespace App\Actions\Tasks;

use App\Contracts\Action;
use App\Data\Tasks\DueAtData;
use App\Models\Task;

final readonly class UpdateTaskDueAt implements Action
{
    public function __construct(
        private Task $task,
        private DueAtData $data,
    ){}

    public function execute(): true
    {
        $this->task->update($this->data->toArray());

        return true;
    }
}
