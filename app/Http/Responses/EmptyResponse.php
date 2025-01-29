<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Support\Enums\StatusCode;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

final readonly class EmptyResponse implements Responsable
{
    public function __construct(
        private StatusCode $status = StatusCode::NO_CONTENT,
    ) {}

    #[Override]
    public function toResponse($request): JsonResponse
    {
        return new WrappedResponse(new JsonResource(null), $this->status)->toResponse($request);
    }
}
