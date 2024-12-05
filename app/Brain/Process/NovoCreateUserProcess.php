<?php

namespace App\Brain\Process;

use App\Arch\Process\Process;
use App\Brain\Tasks\CreateUser;

class NovoCreateUserProcess extends Process
{
    public array $tasks = [
        CreateUser::class,
    ];
}
