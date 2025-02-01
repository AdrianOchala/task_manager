<?php

declare(strict_types=1);

namespace App\Actions\Tasks;

use App\Contracts\Action;
use App\Data\Tasks\TaskData;
use App\Models\Task;
use App\Models\User;

final readonly class CreateTask implements Action
{
    public function __construct(
        private TaskData $data,
        private User $creator,
    ){}

    public function execute(): Task
    {
        $task = Task::create([
            ...$this->data->except('assignee')->toArray(),
            ...[
                'creator_id' => $this->creator->getKey(),
                'assignee_id' => $this->data->assignee?->getKey() ?? $this->creator->getKey(),
            ]
        ]);

        return $task;
    }
}
