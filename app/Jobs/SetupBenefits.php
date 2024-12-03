<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupBenefits implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $user
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('configurar os benefícios', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);

        RequestGymCard::dispatchSync($this->user);
        RequestHealthCard::dispatch($this->user);
        RequestPinguimAcademySubscription::dispatch($this->user);
    }

    public function fail($exception = null)
    {
    }
}
