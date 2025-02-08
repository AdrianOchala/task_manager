<?php

namespace App\Models;

use App\Concerns\HashableId;
use App\Contracts\HashesId;
use App\Models\Abstract\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\ModelStates\HasStates;
use Illuminate\Support\Carbon;
use App\Support\States\Tasks\TaskStatus;

/**
 * @property int $assignee_id
 * @property int $creator_id
 * @property string $name
 * @property string $description
 * @property TaskStatus $status
 * @property Carbon $planned_at
 * @property Carbon $due_at
 */
class Task extends Model implements HashesId
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    use HasStates;
    use HashableId;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => TaskStatus::class,
            'planned_at' => 'date',
            'due_at' => 'date',
        ];
    }
}
