<?php

namespace App\Brain\User\Tasks;

use App\Arch\Tasks\Task;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
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
