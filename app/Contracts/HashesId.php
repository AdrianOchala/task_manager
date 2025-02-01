<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface HashesId
{
    public static function byHash(string $hash): ?self;

    /**
     * @throws ModelNotFoundException
     */
    public static function byHashOrFail(string $hash): self;

    public static function hashToId(string $hash): ?int;

    public static function idToHash(int $primaryKey): string;

    public function getHash(): string;

    public function scopeByHash(Builder $query, string $hash): Builder;

    public function getHashAttribute(): ?string;

    public function getHashKey(): string;

    public function shouldHashPersist(): bool;

    public function getHashColumnName(): string;
}
