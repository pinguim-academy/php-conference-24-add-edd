<?php

declare(strict_types = 1);

namespace App\Brain\HoraExtra\Processes;

use App\Arch\Processes\Process;
use App\Brain\Jeremias\Tasks\Jetete;

class JeremisProcess extends Process
{
    protected array $tasks = [
        Jetete::class
    ];
}
