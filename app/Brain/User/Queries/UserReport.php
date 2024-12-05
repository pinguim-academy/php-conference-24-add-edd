<?php

declare(strict_types = 1);

namespace App\Brain\User\Queries;

use App\Arch\Queries\Query;
use App\Models\User;
use Illuminate\Support\Collection;
use stdClass;

class UserReport extends Query
{
    public function __construct() {
        //
    }

    public function handle(): Collection | stdClass
    {
        return User::query()
            // Add your clauses here
            ->getQuery()
            ->get();
    }
}
