<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Resources\Abstract\Resource;
use Illuminate\Http\Request;
use Override;

class IdentifierResource extends Resource
{
    /**
     * @return array<string, string>
     */
    #[Override]
    public function toAttributes(Request $request): array
    {
        return [];
    }
}
