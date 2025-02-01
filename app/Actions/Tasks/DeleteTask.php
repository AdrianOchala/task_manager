<?php

declare(strict_types=1);

namespace App\Actions\Tasks;

use App\Contracts\Action;
use App\Data\Tasks\TaskData;
use App\Models\Task;
use App\Models\User;

final readonly class DeleteTask implements Action
{
    public function __construct(
        private Task $task,
    ){}

    public function execute(): true
    {
        $this->task->delete();

        return true;
    }
}
