<?php

namespace Database\Seeders;

use App\Brain\User\Processes\CreateUserProcess;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'John Doe', 'email' => 'john@doe.com', 'password' => 'password', 'birthday' => '1990-01-01', 'position' => 'Developer', 'salary' => 1000],
            ['name' => 'Jane Doe', 'email' => 'jane@doe.com', 'password' => 'password', 'birthday' => '1990-01-01', 'position' => 'Developer', 'salary' => 1000],
            ['name' => 'John Smith', 'email' => 'john@smith.com', 'password' => 'password', 'birthday' => '1990-01-01', 'position' => 'Developer', 'salary' => 1000],
            ['name' => 'Jane Smith', 'email' => 'jane@smith.com', 'password' => 'password', 'birthday' => '1990-01-01', 'position' => 'Developer', 'salary' => 1000],
        ];

        foreach ($users as $user) {
            CreateUserProcess::dispatchSync([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'birthday' => $user['birthday'],
                'position' => $user['position'],
                'salary' => $user['salary'],
            ]);
        }
    }
}
