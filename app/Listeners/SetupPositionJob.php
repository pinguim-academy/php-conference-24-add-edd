<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupPositionJob implements ShouldQueue
{
    use Queueable;

    public function handle(UserCreatedEvent $event): void
    {

        Log::info('configurar o histórico de cargo', [
            'user_id' => $event->user->id,
            'position' => $event->user->position,
            'start_date' => $event->user->start_date,
        ]);
    }
}
