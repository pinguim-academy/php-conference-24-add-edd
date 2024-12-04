<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
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

    public function handle(UserCreatedEvent $event): void
    {
        Log::info('envia notificação de boas-vindas');
        $event->user->notify(new WelcomeNotification());
    }

    public function failed($exception = null): void
    {
        Log::error('deu ruim JETETE');
    }
}
