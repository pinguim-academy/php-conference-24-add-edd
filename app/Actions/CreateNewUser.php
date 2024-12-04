<?php

namespace App\Actions;

use App\Jobs\SendsWelcomeNotificationJob;
use App\Jobs\SetupBenefits;
use App\Jobs\SetupPositionJob;
use App\Jobs\SetupSalaryJob;
use App\Models\User;
use Illuminate\Support\Facades\Bus;

class CreateNewUser
{
    /**
     * @param array{name:string, password:string} $data
     * @return User
     */
    public function run(array $data):User
    {
        $user = User::query()->create($data);

        SendsWelcomeNotificationJob::dispatch($user);
        SendsWelcomeNotificationJob::dispatch($user);

        Bus::chain([
            new SetupPositionJob($user),
            new SetupSalaryJob($user),
            new SetupBenefits($user),
        ]);

        return $user;
    }
}
