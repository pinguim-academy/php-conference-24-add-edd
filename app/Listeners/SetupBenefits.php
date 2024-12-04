<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Jobs\RequestGymCard;
use App\Jobs\RequestHealthCard;
use App\Jobs\RequestPinguimAcademySubscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupBenefits implements ShouldQueue
{
    use Queueable;

    public function handle(UserCreatedEvent $event): void
    {
        Log::info('configurar os benefícios', [
            'user_id' => $event->user->id,
            'start_date' => $event->user->start_date,
        ]);

        RequestGymCard::dispatchSync($event->user);
        RequestHealthCard::dispatch($event->user);
        RequestPinguimAcademySubscription::dispatch($event->user);
    }

    public function fail($exception = null)
    {
    }
}
