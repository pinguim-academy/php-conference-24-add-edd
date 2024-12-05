<?php

namespace App\Arch\Processes;

use App\Arch\Tasks\Task;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use ReflectionClass;

class Process
{
    use Dispatchable;

    protected bool $chain = false;

    public function __construct(
        public array|object $payload
    ) {
        if (is_array($this->payload)) {
            $this->payload = (object) $this->payload;
        }
    }

    public function handle()
    {
        return $this->chain
            ? $this->chain()
            : $this->run();
    }

    private function chain()
    {
        Bus::chain(
            array_map(
                fn($task) => new $task($this->payload),
                $this->tasks
            )
        )
            ->dispatch();


        return $this->payload;
    }

    private function run()
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
