<?php

declare(strict_types=1);

namespace App\Actions\Tasks\Status;

use App\Contracts\Action;
use App\Exceptions\Tasks\CannotActivateTaskException;
use App\Models\Task;
use App\Support\States\Tasks\Cancelled;

final readonly class CancelTask implements Action
{
    public function __construct(
        private Task $task
    ){}

    /**
     * @throws CannotActivateTaskException
     */
    public function execute(): true
    {
        $this->task->status->transitionTo(Cancelled::class);

        return true;
    }
}
