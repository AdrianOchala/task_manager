<?php

declare(strict_types=1);

namespace App\Support\States\Tasks\Transitions;

use App\Models\Task;
use App\Support\States\Tasks\Done;
use Spatie\ModelStates\Transition;

class Finish extends Transition
{
    public function __construct(
        private readonly Task $task
    ){}

    public function handle(): Task
    {
        $this->task->status = new Done($this->task);

        return $this->task;
    }
}
