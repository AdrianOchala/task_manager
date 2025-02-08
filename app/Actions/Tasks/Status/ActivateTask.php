<?php

declare(strict_types=1);

namespace App\Actions\Tasks\Status;

use App\Contracts\Action;
use App\Exceptions\Tasks\TaskExpiredException;
use App\Models\Task;
use App\Support\States\Tasks\Active;

final readonly class ActivateTask implements Action
{
    public function __construct(
        private Task $task
    ){}

    /**
     * @throws TaskExpiredException
     */
    public function execute(): true
    {
        $this->task->status->transitionTo(Active::class);

        return true;
    }
}
