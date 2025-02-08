<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\Abstract\Resource;
use Override;
use App\Models\Task;

/**
 * @mixin Task
 */
class TaskResource extends Resource
{
    #[Override]
    public function toAttributes($request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'planned_at' => $this->planned_at,
            'due_at' => $this->due_at,
            'assignee' => new UserResource($this->whenLoaded('assignee')),
            'creator' => new UserResource($this->whenLoaded('creator')),
            'updated_at'=> $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
