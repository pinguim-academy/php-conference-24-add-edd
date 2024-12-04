<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupSalaryJob implements ShouldQueue
{
    use Queueable;

    public function handle(UserCreatedEvent $event): void
    {
        Log::info('configurar o histórico de salário', [
            'user_id' => $event->user->id,
            'salary' => $event->user->salary,
            'start_date' => $event->user->start_date,
        ]);
    }
}
