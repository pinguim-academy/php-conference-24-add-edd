<?php

namespace App\Observers;

use App\Jobs\SendMessageToLeaderJob;
use App\Jobs\SendsWelcomeNotificationJob;
use App\Jobs\SetupBenefits;
use App\Jobs\SetupPositionJob;
use App\Jobs\SetupSalaryJob;
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
