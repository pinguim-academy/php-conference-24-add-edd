<?php

declare(strict_types = 1);

namespace App\Brain\User\Tasks;

use App\Arch\Tasks\Task;

/**
 * Task Show
 *
 * @property-read string $example
 */
class Show extends Task
{
    public function handle(): self
    {
        //

        return $this;
    }
}
