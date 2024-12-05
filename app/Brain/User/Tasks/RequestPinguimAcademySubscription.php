<?php

namespace App\Brain\User\Tasks;

use App\Arch\Tasks\Task;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * @property-read User $user
 */
class RequestPinguimAcademySubscription extends Task implements ShouldQueue
{
    /**
     * Set tags that will be used to identify the task
     * on the queue management system
     *
     * @return string[]
     */
    public function tags(): array
    {
        return [
            'user: ' . $this->user->email,
            'month: ' . now()->format('Y-m'),
        ];
    }

    public function handle(): void
    {
        Log::info('solicitar inscrição na academia Pinguim', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);
    }
}
