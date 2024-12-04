<?php

namespace App\Observers;

use App\Listeners\SendMessageToLeaderJob;
use App\Listeners\SendsWelcomeNotificationJob;
use App\Listeners\SetupBenefits;
use App\Listeners\SetupPositionJob;
use App\Listeners\SetupSalaryJob;
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
