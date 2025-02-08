<?php

declare(strict_types=1);

namespace App\Http\Resources\Abstract;

use App\Contracts\HashesId;
use App\Models\Abstract\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Override;

/**
 * @mixin Model
 */
abstract class Resource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        $attributes = $this->filter($this->toAttributes($request));

        $resourceId = $this->resourceId();
        $resourceType = $this->resourceType();

        return [
            'id' => $this->whenNotNull($resourceId),
            'type' => $this->whenNotNull($resourceType),
            'attributes' => $this->unless(empty($attributes), $attributes),
        ];
    }

    abstract public function toAttributes(Request $request): array;

    public function resourceId(): string|null
    {
        if ($this->resource instanceof HashesId) {
            return $this->resource->getHash();
        }

        return null;
    }

    public function resourceType(): string
    {
        return $this->resource->getTable();
    }
}
