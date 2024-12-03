<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendsWelcomeNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public User $user
    )
    {
    }

    public function handle(): void
    {
        Log::info('envia notificação de boas-vindas');
        $this->user->notify(new WelcomeNotification());
    }
}
