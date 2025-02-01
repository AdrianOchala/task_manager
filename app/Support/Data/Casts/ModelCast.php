<?php

declare(strict_types=1);

namespace App\Support\Data\Casts;

use App\Contracts\HashesId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Override;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class ModelCast implements Cast
{
    /**
     * @param class-string<Model&HashesId> $class
     */
    public function __construct(
        protected string $class,
    ) {}

    #[Override]
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?Model
    {
        if (! $value || $value instanceof $this->class) {
            return $value;
        }

        /** @var Builder<Model&HashesId> $query */
        $query = $this->class::query();

        return $query->byHash($value)
            ->firstOrFail();
    }
}
