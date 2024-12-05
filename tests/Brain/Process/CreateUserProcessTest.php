<?php

use App\Brain\Process\CreateUserProcess;
use App\Brain\Tasks\CreateUser;
use App\Brain\Tasks\SendMessageToLeaderJob;
use App\Brain\Tasks\SendsWelcomeNotificationJob;
use App\Brain\Tasks\SetupPositionJob;
use App\Brain\Tasks\SetupSalaryJob;

test('check if has tasks', function () {
    $process = new CreateUserProcess([]);

    expect($process)
        ->tasks
        ->toMatchArray([
            CreateUser::class,
            SendsWelcomeNotificationJob::class,
            SendMessageToLeaderJob::class,
            SetupPositionJob::class,
            SetupSalaryJob::class,
        ]);
});
