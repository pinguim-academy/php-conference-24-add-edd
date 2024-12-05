<?php

namespace App\Brain\User\Tasks;

use App\Arch\Tasks\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @property-read User $user
 */
class SetupPositionJob extends Task
{
    public function handle(): self
    {
        Log::info('configurar o histórico de cargo', [
            'user_id' => $this->user->id,
            'position' => $this->user->position,
            'start_date' => $this->user->start_date,
        ]);

//        throw new \Exception('Erro ao configurar o cargo');

        return $this;
    }
}
