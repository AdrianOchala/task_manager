<?php

declare(strict_types=1);

namespace App\Support\States\Tasks\Transitions;

use App\Models\Task;
use App\Support\States\Tasks\Cancelled;
use Spatie\ModelStates\Transition;

class Cancel extends Transition
{
    public function __construct(
        private readonly Task $task
    ){}

    public function handle(): Task
    {
        $this->task->status = new Cancelled($this->task);

        return $this->task;
    }
}
