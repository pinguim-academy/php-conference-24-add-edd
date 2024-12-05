<?php

namespace App\Brain\Tasks;

use App\Arch\Task\Task;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * @property-read  User $user
 */
class SendsWelcomeNotificationJob extends Task implements ShouldQueue
{
    public function handle(): void
    {
        Log::info('envia notificação de boas-vindas');
        $this->user->notify(new WelcomeNotification);
    }

    public function failed($exception = null): void
    {
        Log::error('deu ruim JETETE');
    }
}
