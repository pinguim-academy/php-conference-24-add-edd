<?php

namespace App\Brain\User\Processes;

use App\Arch\Processes\Process;
use App\Brain\User\Tasks\CreateUser;

class NovoCreateUserProcess extends Process
{
    public array $tasks = [
        CreateUser::class,
    ];
}
