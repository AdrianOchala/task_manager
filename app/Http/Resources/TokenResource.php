<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'Bearer',
            'token' => $this->plainTextToken,
            'expires_at' => $this->accessToken->expires_at,
        ];
    }
}
