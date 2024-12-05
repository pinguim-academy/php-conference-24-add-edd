<?php

namespace App\Observers;

use App\Brain\User\Tasks\SendMessageToLeaderJob;
use App\Brain\User\Tasks\SendsWelcomeNotificationJob;
use App\Brain\User\Tasks\SetupBenefits;
use App\Brain\User\Tasks\SetupPositionJob;
use App\Brain\User\Tasks\SetupSalaryJob;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        SendMessageToLeaderJob::dispatch($user);
        SendsWelcomeNotificationJob::dispatch($user);
        SetupPositionJob::dispatch($user);
        SetupBenefits::dispatch($user);
        SetupSalaryJob::dispatch($user);
    }
}
