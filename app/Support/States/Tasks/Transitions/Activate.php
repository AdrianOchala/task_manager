<?php

declare(strict_types=1);

namespace App\Support\States\Tasks\Transitions;

use App\Exceptions\Tasks\TaskExpiredException;
use App\Models\Task;
use App\Support\States\Tasks\Active;
use App\Support\States\Tasks\Pending;
use Spatie\ModelStates\Transition;

class Activate extends Transition
{
    public function __construct(
        private readonly Task $task
    ){}

    public function handle(): Task
    {
        if ($this->task->due_at->lt(now())) {
            throw new TaskExpiredException();
        }

        $this->task->status = new Active($this->task);
        $this->task->save();

        return $this->task;
    }

    public function canTransition(): bool
    {
        return $this->task->status->equals(Pending::class);
    }
}
