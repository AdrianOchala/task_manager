<?php

declare(strict_types=1);

namespace App\Support\States\Tasks;

use App\Support\States\Tasks\Pending;
use App\Support\States\Tasks\Transitions\Activate;
use App\Support\States\Tasks\Transitions\Cancel;
use App\Support\States\Tasks\Transitions\Finish;
use Override;
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class TaskStatus extends State
{
    #[Override]
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->ignoreSameState()
            ->allowTransition(Pending::class, Active::class, Activate::class)
            ->allowTransition(Pending::class, Cancelled::class, Cancel::class)
            ->allowTransition(Pending::class, Done::class, Finish::class)
            ->allowTransition(Active::class, Done::class, Finish::class)
            ->allowTransition(Active::class, Cancelled::class, Cancel::class);
    }
}
