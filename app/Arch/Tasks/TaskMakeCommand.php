<?php

declare(strict_types = 1);

namespace App\Arch\Tasks;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class TaskMakeCommand extends GeneratorCommand
{
    protected $name = 'make:task';

    protected $description = 'Create a new task class';

    protected $type = 'Task';

    protected function getStub(): string
    {
        return app_path('Arch/Tasks/stubs/task.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "$rootNamespace\Brain\Tasks";
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the task. Ex.: ExampleTask.'],
        ];
    }
}
