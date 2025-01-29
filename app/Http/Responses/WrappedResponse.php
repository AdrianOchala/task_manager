<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Support\Enums\StatusCode;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

final readonly class WrappedResponse implements Responsable
{
    public function __construct(
        private JsonResource $data,
        private StatusCode $status = StatusCode::OK,
    ) {}

    #[Override]
    public function toResponse($request): JsonResponse
    {
        return $this->data->toResponse($request)->setStatusCode($this->status->value);
    }
}
