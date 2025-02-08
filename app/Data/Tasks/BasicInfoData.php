<?php

declare(strict_types=1);

namespace App\Data\Tasks;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BasicInfoData extends Data
{
    public function __construct(
        #[Max(255)]
        public readonly string|Optional $name,
        #[Max(65535)]
        public readonly string|Optional $description,
    ){}

    public static function attributes(): array
    {
        return [
            'name' => trans('models.tasks.name'),
            'description' => trans('models.tasks.description'),
        ];
    }
}
