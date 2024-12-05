<?php

namespace App\Observers;

use App\Brain\Tasks\SendMessageToLeaderJob;
use App\Brain\Tasks\SendsWelcomeNotificationJob;
use App\Brain\Tasks\SetupBenefits;
use App\Brain\Tasks\SetupPositionJob;
use App\Brain\Tasks\SetupSalaryJob;
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
