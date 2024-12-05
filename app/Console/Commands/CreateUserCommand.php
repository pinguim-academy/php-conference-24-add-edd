<?php

namespace App\Console\Commands;

use App\Brain\Process\CreateUserProcess;
use App\Brain\Tasks\CreateUser;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'create:user';

    protected $description = 'Command description';

    public function handle(): void
    {

        CreateUser::dispatchSync([
            'name' => 'John Doe',
            'email' => 'joe@doe.com',
            'password' => 'password',
            'birthday' => '1990-01-01',
            'position' => 'Developer',
            'salary' => 1000,
        ]);
    }
}
