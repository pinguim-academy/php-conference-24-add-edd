<?php

namespace App\Brain\Processes;

use App\Arch\Processes\Process;
use App\Brain\Tasks\CreateUser;
use App\Brain\Tasks\SendMessageToLeaderJob;
use App\Brain\Tasks\SendsWelcomeNotificationJob;
use App\Brain\Tasks\SetupPositionJob;
use App\Brain\Tasks\SetupSalaryJob;
use App\Models\User;

/**
 * @property-read User $user
 */
class CreateUserProcess extends Process
{
    public array $tasks = [
        CreateUser::class,
        SendsWelcomeNotificationJob::class,
        SendMessageToLeaderJob::class,
        SetupPositionJob::class,
        SetupSalaryJob::class,
        SetupBenefitsProcess::class,
    ];
}
