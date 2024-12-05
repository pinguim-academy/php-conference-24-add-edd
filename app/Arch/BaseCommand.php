<?php

declare(strict_types = 1);

namespace App\Arch;

use Illuminate\Console\GeneratorCommand;

use function Laravel\Prompts\suggest;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

abstract class BaseCommand extends GeneratorCommand
{

    protected function afterPromptingForMissingArguments(InputInterface $input, OutputInterface $output): void
    {
        if ($this->isReservedName($this->getNameInput()) || $this->didReceiveOptions($input)) {
            return;
        }

        if ($input->hasArgument('model')) {
            $model = suggest(
                label: 'What model this belongs to?',
                options: $this->possibleModels(),
                required: true
            );

            if ($model) {
                $input->setArgument('model', $model);
            }
        }

        if ($input->hasArgument('domain')) {
            $domain = suggest(
                label: 'What domain this belongs to?',
                options: $this->possibleDomains(),
                required: true
            );

            if ($domain) {
                $input->setArgument('domain', $domain);
            }
        }
    }

    public function possibleDomains()
    {
        $modelPath = app_path('Brain');

        return collect(Finder::create()->directories()->depth(0)->in($modelPath))
            ->map(fn (SplFileInfo $file) => $file->getFilename())
            ->sort()
            ->values()
            ->all();
    }
}
