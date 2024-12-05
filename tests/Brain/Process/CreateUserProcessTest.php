<?php

use App\Brain\User\Processes\CreateUserProcess;
use App\Brain\User\Processes\SetupBenefitsProcess;
use App\Brain\User\Tasks\CreateUser;
use App\Brain\User\Tasks\SendMessageToLeaderJob;
use App\Brain\User\Tasks\SendsWelcomeNotificationJob;
use App\Brain\User\Tasks\SetupPositionJob;
use App\Brain\User\Tasks\SetupSalaryJob;

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
