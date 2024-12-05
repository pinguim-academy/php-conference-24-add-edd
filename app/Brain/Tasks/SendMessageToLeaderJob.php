<?php

namespace App\Brain\Tasks;

use App\Arch\Tasks\Task;
use App\Models\User;
use App\Notifications\MensagemDoLiderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * @property-read User $user
 */
class SendMessageToLeaderJob extends Task implements ShouldQueue
{
    public function handle(): void
    {
        if (! $user = $this->user->refresh()) {
            Log::error('usuário não encontrado');

            return;
        }

        Log::info('envia email para o líder');
        $lider = User::query()->find(1);
        $lider->notify(new MensagemDoLiderNotification($this->user));
    }
}
