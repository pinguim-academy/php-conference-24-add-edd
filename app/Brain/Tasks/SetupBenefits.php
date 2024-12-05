<?php

namespace App\Brain\Tasks;

use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SetupBenefits
{
    use Dispatchable;

    public function __construct(
        public User $user
    ) {}

    public function handle(): void
    {
        Log::info('configurar os benefícios', [
            'user_id' => $this->user->id,
            'start_date' => $this->user->start_date,
        ]);

        RequestGymCard::dispatch($this->user);
        RequestHealthCard::dispatch($this->user);
        RequestPinguimAcademySubscription::dispatch($this->user);
    }
}
