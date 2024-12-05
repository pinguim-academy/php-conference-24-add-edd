<?php

namespace App\Brain\Process;

use App\Arch\Process\Process;
use App\Brain\Tasks\RequestGymCard;
use App\Brain\Tasks\RequestHealthCard;
use App\Brain\Tasks\RequestPinguimAcademySubscription;

class SetupBenefitsProcess extends Process
{
    protected bool $chain = true;

    public array $tasks = [
        RequestGymCard::class,
        RequestHealthCard::class,
        RequestPinguimAcademySubscription::class
    ];
}
