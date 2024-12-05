<?php

use App\Brain\User\Tasks\CreateUser;
use App\Models\User;
use function Pest\Laravel\assertDatabaseHas;

it('needs to create a new user', function () {

    CreateUser::dispatchSync([
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'birthday' => fake()->date,
        'position' => fake()->jobTitle,
        'salary' => fake()->randomNumber(4),
    ]);

    assertDatabaseHas('users', [
        'name' => 'John Doe',
    ]);

});

it('should return the created user', function () {
    $payload = CreateUser::dispatchSync([
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'birthday' => fake()->date,
        'position' => fake()->jobTitle,
        'salary' => fake()->randomNumber(4),
    ]);

    expect($payload->user)->toBeInstanceOf(User::class)
        ->and($payload->user)->name->toBe('John Doe');
});
