<?php

use App\Brain\Processes\CreateUserProcess;
use App\Brain\Processes\SetupBenefitsProcess;
use App\Brain\Tasks\CreateUser;
use App\Brain\Tasks\SendMessageToLeaderJob;
use App\Brain\Tasks\SendsWelcomeNotificationJob;
use App\Brain\Tasks\SetupPositionJob;
use App\Brain\Tasks\SetupSalaryJob;

test('check if has tasks', function () {
    $process = new CreateUserProcess([]);


    expect($process)
        ->tasks
        ->toEqual([
            CreateUser::class,
            SendsWelcomeNotificationJob::class,
            SendMessageToLeaderJob::class,
            SetupBenefitsProcess::class,
            SetupPositionJob::class,
            SetupSalaryJob::class,
        ]);
});
