<?php

namespace App\Arch\Tasks;

use AllowDynamicProperties;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

#[AllowDynamicProperties]
class Task
{
    use Queueable;

    public function __construct(
        public array|object $payload
    ) {
        if (is_array($this->payload)) {
            $this->payload = (object) $this->payload;
        }

        Log::info('Running Task:: '. static::class, [
            'payload' => $this->payload,
        ]);
    }

    protected function cancelProcess(): void
    {
        $this->payload->cancelProcess = true;
    }

    public function __get(string $name)
    {
        if (isset($this->payload->$name)) {
            return data_get($this->payload, $name);
        }

        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set(string $name, $value): void
    {
        $this->payload->$name = $value;
    }
}
