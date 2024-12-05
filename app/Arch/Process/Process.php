<?php

namespace App\Arch\Process;

use App\Arch\Task\Task;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use ReflectionClass;

class Process
{
    use Dispatchable;

    public function __construct(
        public array|object $payload
    ) {
        if (is_array($this->payload)) {
            $this->payload = (object) $this->payload;
        }
    }

    public function handle()
    {
        DB::beginTransaction();
        try {
            foreach ($this->tasks as $task) {

                if (isset($this->payload->cancelProcess)) {

                    break;
                }

                if ((new ReflectionClass($task))->implementsInterface(ShouldQueue::class)) {
                    $task::dispatch(
                        $this->payload
                    );

                    continue;
                }

                $temp = $task::dispatchSync(
                    $this->payload
                );

                $this->payload = $temp instanceof Task ? $temp->payload: $temp;
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $this->payload;
    }
}
