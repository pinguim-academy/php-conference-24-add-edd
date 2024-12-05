<?php

declare(strict_types = 1);

namespace App\Brain\Jeremias\Tasks;

use App\Arch\Tasks\Task;
use Illuminate\Support\Facades\Log;

/**
 * Task Jetete
 *
 * @property-read string $email
 */
class Jetete extends Task
{
    public function handle(): self
    {
        Log::info('email');

        return $this;
    }
}
