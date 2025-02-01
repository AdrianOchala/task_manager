<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Http\Resources\IdentifierResource;
use App\Support\Enums\StatusCode;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Override;

final readonly class CreatedResponse implements Responsable
{
    public function __construct(
        private Model $model,
        private StatusCode $status = StatusCode::OK
    ) {}

    #[Override]
    public function toResponse($request): JsonResponse
    {
        return new WrappedResponse(new IdentifierResource($this->model), $this->status)->toResponse($request);
    }
}
