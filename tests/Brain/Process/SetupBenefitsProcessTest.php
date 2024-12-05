<?php

use App\Brain\User\Processes\SetupBenefitsProcess;
use App\Brain\User\Tasks\RequestGymCard;
use App\Brain\User\Tasks\RequestHealthCard;
use App\Brain\User\Tasks\RequestPinguimAcademySubscription;

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
