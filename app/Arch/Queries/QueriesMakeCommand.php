<?php

declare(strict_types = 1);

namespace App\Arch\Queries;

use App\Arch\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make:query')]
class QueriesMakeCommand extends BaseCommand
{
    protected $name = 'make:query';

    protected $description = 'Create a new query class';

    protected $type = 'Query';

    protected function getStub(): string
    {
        return app_path('Arch/Queries/stubs/query.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $domain = $this->argument('domain');

        return "$rootNamespace\Brain\\$domain\Queries";
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the query'],
            ['model', InputArgument::OPTIONAL, 'The name of the model'],
            ['domain', InputArgument::OPTIONAL, 'The name of the domain. Ex.: PTO'],
        ];
    }

    protected function buildClass($name): string
    {
        $class = parent::buildClass($name);

        return str_replace(
            ['DummyModel', '{{ model }}', '{{model}}'],
            $this->argument('model'),
            $class,
        );
    }
}
