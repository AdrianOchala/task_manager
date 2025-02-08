<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Contracts\Action;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

final readonly class CreateApiToken implements Action
{
    public function __construct(
        private HasApiTokens $user,
        private string $device,
    ) {}

    public function execute(): NewAccessToken
    {
        return $this->user->createToken($this->device);
    }
}
