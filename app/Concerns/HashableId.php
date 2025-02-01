<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId as VeelaskyHashableId;

/**
 * @mixin Model
 */
trait HashableId
{
    use VeelaskyHashableId;

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getHashKey(): string
    {
        return property_exists($this, 'hashKey')
            ? $this->hashKey
            : $this->getMorphClass();
    }
}
