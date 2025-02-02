<?php

declare(strict_types=1);

namespace App\Support\States\Tasks\Transitions;

use App\Models\Task;
use App\Support\States\Tasks\Active;
use Spatie\ModelStates\Transition;

class Activate extends Transition
{
    public function __construct(
        private readonly Task $task
    ){}

    public function handle(): Task
    {
        $this->task->status = new Active($this->task);
        $this->task->save();

        return $this->task;
    }

    public function canTransition(): bool
    {
        return $this->task->due_at->gt(now());
    }
}
