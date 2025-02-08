<?php

declare(strict_types=1);

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public function __construct(
        #[Email]
        public readonly string $email,
        #[Min(8)]
        public readonly string $password,
        public readonly string $device,
    ) {}

    public static function attributes(): array
    {
        return [
            'email' => trans('models.users.email'),
            'password' => trans('models.users.password'),
            'device' => trans('models.users.device'),
        ];
    }
}
