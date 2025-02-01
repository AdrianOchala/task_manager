<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\Abstract\Resource;
use App\Models\User;

/**
 * @mixin User
 */
class UserResource extends Resource
{
    public function toAttributes($request): array
    {
        return [
            'name' => $this->name,
            'email'=> $this->email,
            'updated_at'=> $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
