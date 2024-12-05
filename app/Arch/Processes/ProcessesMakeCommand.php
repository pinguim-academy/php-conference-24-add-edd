<?php

namespace App\Arch\Processes;

use App\Arch\BaseCommand;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ProcessesMakeCommand extends BaseCommand
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
        $domain = $this->argument('domain');

        return "$rootNamespace\Brain\\$domain\Processes";
    }

    protected function getArguments():array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the process. Ex.: ExampleProcess.'],
            ['domain', InputArgument::OPTIONAL, 'The name of the domain. Ex.: User'],
        ];
    }
}
