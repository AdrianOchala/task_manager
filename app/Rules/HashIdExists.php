<?php

declare(strict_types=1);

namespace App\Rules;

use App\Contracts\HashesId;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Validator;
use Override;

class HashIdExists extends Exists implements ValidationRule, ValidatorAwareRule
{
    protected Model&HashesId $model;

    protected Validator $validator;

    /**
     * @param class-string<Model&HashesId> $class
     */
    public function __construct(string $class)
    {
        $this->model = new $class;

        parent::__construct($class, $this->model->shouldHashPersist() ? $this->model->getHashColumnName() : $this->model->getKeyName());
    }

    #[Override]
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value || (! $this->model->shouldHashPersist() && ! $value = $this->model::hashToId($value))) {
            $this->fail($attribute, $fail);

            return;
        }

        $validator = validator([
            $attribute => $value,
        ], [
            $attribute => $this->buildParentRule(),
        ]);

        if ($validator->fails()) {
            $this->fail($attribute, $fail);
        }
    }

    #[Override]
    public function setValidator(Validator $validator): static
    {
        $this->validator = $validator;

        return $this;
    }

    protected function fail(string $attribute, Closure $fail): void
    {
        $fail($this->validator->customMessages["{$attribute}.hashIdExists"] ?? 'validation.exists')
            ->translate([
                'attribute' => $this->validator->getDisplayableAttribute($attribute),
            ]);
    }

    protected function buildParentRule(): Exists
    {
        return tap(new parent($this->table, $this->column), function (Exists $parent): void {
            $parent->wheres = $this->wheres;
            $parent->using = $this->using;
        });
    }
}
