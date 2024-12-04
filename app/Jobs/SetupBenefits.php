<?php

namespace App\Jobs;

use App\Events\UserCreatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupBenefits implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public User $user
    )
    {
    }

    public function handle(): void
    {
        Log::info('configurar os benefícios', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);

        RequestGymCard::dispatch($this->user);
        RequestHealthCard::dispatch($this->user);
        RequestPinguimAcademySubscription::dispatch($this->user);
    }

}
