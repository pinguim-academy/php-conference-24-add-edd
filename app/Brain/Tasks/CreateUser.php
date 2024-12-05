<?php

namespace App\Brain\Tasks;

use App\Arch\Tasks\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @property-read string $name
 * @property-read string $password
 * @property-read string $email
 * @property-read string $birthday
 * @property-read string $position
 * @property-read string $salary
 * @property User $user
 */
class CreateUser extends Task
{
    public function handle(): self
    {
        if (! now()->between(now()->day(1), now()->day(10))) {
            Log::info('Não é possível criar usuário fora do período de criação');

            $this->cancelProcess();

            return $this;
        }

        $user = User::query()->create([
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email,
            'birthday' => $this->birthday,
            'position' => $this->position,
            'salary' => $this->salary,
            'start_date' => now()->addDays(7),
        ]);

        Log::info('Criando usuário');
        $this->user = $user;

        return $this;
    }
}
