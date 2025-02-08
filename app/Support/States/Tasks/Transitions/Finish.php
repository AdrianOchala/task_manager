<?php

declare(strict_types=1);

namespace App\Support\States\Tasks\Transitions;

use App\Models\Task;
use App\Support\States\Tasks\Active;
use App\Support\States\Tasks\Done;
use App\Support\States\Tasks\Pending;
use Spatie\ModelStates\Transition;

class Finish extends Transition
{
    public function __construct(
        private readonly Task $task
    ){}

    public function handle(): Task
    {
        $this->task->status = new Done($this->task);
        $this->task->save();

        return $this->task;
    }

    public function canTransition(): bool
    {
        return $this->task->status->equals(Pending::class, Active::class);
    }
}
