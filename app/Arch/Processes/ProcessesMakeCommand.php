<?php

namespace App\Arch\Processes;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ProcessesMakeCommand extends GeneratorCommand
{
    protected $name = 'make:process';

    protected $description = 'Create a new process class';

    protected $type = 'Process';

    protected function getStub():string
    {
        return app_path('Arch/Processes/stubs/process.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "$rootNamespace\Brain\Processes";
    }

    protected function getArguments():array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the process. Ex.: ExampleProcess.'],
        ];
    }
}
