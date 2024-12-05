<?php

declare(strict_types = 1);

namespace App\Arch\Tasks;

use App\Arch\BaseCommand;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class TaskMakeCommand extends BaseCommand
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
        $domain = $this->argument('domain');

        return "$rootNamespace\Brain\\$domain\Tasks";
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the task. Ex.: ExampleTask.'],
            ['domain', InputArgument::OPTIONAL, 'The name of the domain. Ex.: User'],
        ];
    }
}
