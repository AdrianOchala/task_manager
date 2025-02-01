<?php

namespace App\Models;

use App\Concerns\HashableId;
use App\Contracts\HashesId;
use App\Support\States\Tasks\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\TaskFactory;
use Spatie\ModelStates\HasStates;
use Illuminate\Support\Carbon;
use App\Models\Abstract\Model;

/**
 * @property TaskStatus $status
 * @property Carbon $planned_at
 * @property Carbon $due_at
 */
class Task extends Model implements HashesId
{
    /** @use HasFactory<TaskFactory> */
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
