<?php

namespace App\Arch\Task;

use AllowDynamicProperties;
use Illuminate\Foundation\Queue\Queueable;

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
