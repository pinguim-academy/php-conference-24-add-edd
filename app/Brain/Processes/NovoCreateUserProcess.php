<?php

namespace App\Brain\Processes;

use App\Arch\Processes\Process;
use App\Brain\Tasks\CreateUser;

class NovoCreateUserProcess extends Process
{
    public array $tasks = [
        CreateUser::class,
    ];
}
