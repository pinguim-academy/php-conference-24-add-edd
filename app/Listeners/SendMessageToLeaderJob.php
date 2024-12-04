<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Models\User;
use App\Notifications\MensagemDoLiderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessageToLeaderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(UserCreatedEvent $event): void
    {
        Log::info('envia email para o líder');
        $lider = User::query()->find(1);
        $lider->notify(new MensagemDoLiderNotification($event->user));
    }

    public function failed($exception = null)
    {
        Log::error('deu ruim JETETE');
    }
}
