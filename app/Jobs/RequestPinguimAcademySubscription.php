<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class RequestPinguimAcademySubscription implements ShouldQueue
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
        Log::info('solicitar inscrição na academia Pinguim', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);
    }
}
