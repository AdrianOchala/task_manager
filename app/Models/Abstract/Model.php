<?php

declare(strict_types=1);

namespace App\Models\Abstract;

use App\Concerns\HashableId;
use App\Contracts\HashesId;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel implements HashesId
{
    use HashableId;
}
