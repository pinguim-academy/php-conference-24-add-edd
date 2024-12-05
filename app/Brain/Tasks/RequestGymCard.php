<?php

namespace App\Brain\Tasks;

use App\Arch\Task\Task;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

/**
 * @property-read User $user
 */
class RequestGymCard extends Task implements ShouldQueue
{
    public function handle(): void
    {
        Log::info('solicitar cartão da academia', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);
    }
}
