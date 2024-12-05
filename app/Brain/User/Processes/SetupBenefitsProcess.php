<?php

namespace App\Brain\User\Processes;

use App\Arch\Processes\Process;
use App\Brain\User\Tasks\RequestGymCard;
use App\Brain\User\Tasks\RequestHealthCard;
use App\Brain\User\Tasks\RequestPinguimAcademySubscription;

class SetupBenefitsProcess extends Process
{
    protected bool $chain = true;

    public array $tasks = [
        RequestGymCard::class,
        RequestHealthCard::class,
        RequestPinguimAcademySubscription::class
    ];
}
