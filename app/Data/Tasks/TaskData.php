<?php

declare(strict_types=1);

namespace App\Data\Tasks;

use App\Models\User;
use App\Support\Data\Casts\ModelCast;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Veelasky\LaravelHashId\Rules\ExistsByHash;

class TaskData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        #[WithCast(DateTimeInterfaceCast::class, format: "Y-m-d")]
        public readonly Carbon $planned_at,
        #[WithCast(DateTimeInterfaceCast::class, format: "Y-m-d")]
        public readonly Carbon $due_at,
        #[Rule(new ExistsByHash(User::class)), WithCast(ModelCast::class, class: User::class)]
        public readonly ?User $assignee
    ){}

    public static function attributes(): array
    {
        return [
            'name' => trans('models.tasks.name'),
            'description' => trans('models.tasks.description'),
            'planned_at' => trans('models.tasks.planned_at'),
            'due_at' => trans('models.tasks.due_at'),
            'assignee' => trans('models.tasks.assignee'),
        ];
    }
}
