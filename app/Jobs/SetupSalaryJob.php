<?php

namespace App\Jobs;

use App\Events\UserCreatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SetupSalaryJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public User $user
    )
    {
    }
    public function handle(): void
    {
        Log::info('configurar o histórico de salário', [
            'user_id' => $this->user->id,
            'salary' => $this->user->salary,
            'start_date' => $this->user->start_date,
        ]);
    }
}
