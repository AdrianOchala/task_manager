<?php

declare(strict_types=1);

namespace App\Data\Tasks;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class PlannedAtData extends Data
{
    public function __construct(
        #[WithCast(DateTimeInterfaceCast::class, format: "Y-m-d")]
        public readonly Carbon $planned_at,
    ){}

    public static function attributes(): array
    {
        return [
            'planned_at' => trans('models.tasks.planned_at'),
        ];
    }
}
