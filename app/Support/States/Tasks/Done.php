<?php


declare(strict_types=1);

namespace App\Support\States\Tasks;

use App\Support\States\Tasks\TaskStatus;

class Done extends TaskStatus
{
    public static string $name = "done";
}
