<?php

namespace App\Brain\Tasks;

use App\Arch\Task\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @property-read User $user
 */
class SetupSalaryJob extends Task
{
    public function handle(): self
    {
        Log::info('configurar o histórico de salário', [
            'user_id' => $this->user->id,
            'salary' => $this->user->salary,
            'start_date' => $this->user->start_date,
        ]);

        $this->user->update([
            'salary' => '9999999',
        ]);

        return $this;
    }
}
