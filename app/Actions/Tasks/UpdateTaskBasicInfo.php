<?php

declare(strict_types=1);

namespace App\Actions\Tasks;

use App\Contracts\Action;
use App\Data\Tasks\BasicInfoData;
use App\Models\Task;

final readonly class UpdateTaskBasicInfo implements Action
{
    public function __construct(
        private Task $task,
        private BasicInfoData $data,
    ){}

    public function execute(): bool
    {
        if (empty($this->data->toArray())) {
            return false;
        }

        $this->task->update($this->data->toArray());

        return true;
    }
}
