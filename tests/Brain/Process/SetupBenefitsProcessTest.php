<?php

use App\Brain\Processes\CreateUserProcess;
use App\Brain\Processes\SetupBenefitsProcess;
use App\Brain\Tasks\CreateUser;
use App\Brain\Tasks\RequestGymCard;
use App\Brain\Tasks\RequestHealthCard;
use App\Brain\Tasks\RequestPinguimAcademySubscription;
use App\Brain\Tasks\SendMessageToLeaderJob;
use App\Brain\Tasks\SendsWelcomeNotificationJob;
use App\Brain\Tasks\SetupPositionJob;
use App\Brain\Tasks\SetupSalaryJob;

test('check if has tasks', function () {
    $process = new SetupBenefitsProcess([]);


    expect($process)
        ->tasks
        ->toEqual([
            RequestGymCard::class,
            RequestHealthCard::class,
            RequestPinguimAcademySubscription::class
        ]);
});
