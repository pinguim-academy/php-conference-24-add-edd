<?php

namespace App\Brain\User\Processes;

use App\Arch\Processes\Process;
use App\Brain\User\Tasks\CreateUser;
use App\Brain\User\Tasks\SendMessageToLeaderJob;
use App\Brain\User\Tasks\SendsWelcomeNotificationJob;
use App\Brain\User\Tasks\SetupPositionJob;
use App\Brain\User\Tasks\SetupSalaryJob;
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
