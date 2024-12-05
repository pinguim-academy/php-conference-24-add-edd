<?php

declare(strict_types = 1);

namespace App\Arch\Queries;

abstract class Query
{
    abstract public function handle(): mixed;

    public static function run(...$args): mixed
    {
        $args = array_values($args);

        return (new static(...$args))->handle(); // @phpstan-ignore-line
    }
}
