<?php

namespace Tests\Http\Controllers\Api;

use App\Brain\Processes\CreateUserProcess;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;

// validacoes

test('name is required', function () {
    postJson(route('users.store'), [
        'email' => fake()->email,
        'password' => fake()->password,
    ])->assertJsonValidationErrors('name');
});

test('email is required', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'password' => fake()->password,
    ])->assertJsonValidationErrors('email');
});

test('email must be a valid email', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => 'invalid-email',
        'password' => fake()->password,
    ])->assertJsonValidationErrors('email');
});

test('email must be unique', function () {
    $user = User::factory()->create();

    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => $user->email,
        'password' => fake()->password,
    ])->assertJsonValidationErrors('email');
});

test('birthday can be nullable', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'birthday' => null,
    ])->assertJsonMissingValidationErrors('birthday');
});

test('birthday must be a valid date', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'birthday' => 'invalid-date',
    ])->assertJsonValidationErrors('birthday');
});

test('start_date can be nullable', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'start_date' => null,
    ])->assertJsonMissingValidationErrors('start_date');
});

test('start_date must be a valid date', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'start_date' => 'invalid-date',
    ])->assertJsonValidationErrors('start_date');
});

test('position can be nullable', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'position' => null,
    ])->assertJsonMissingValidationErrors('position');
});

test('salary can be nullable', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'salary' => null,
    ])->assertJsonMissingValidationErrors('salary');
});

test('salary must be an integer', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'salary' => 'not-an-integer',
    ])->assertJsonValidationErrors('salary');
});

test('password is required', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
    ])->assertJsonValidationErrors('password');
});

test('password must be at least 8 characters', function () {
    postJson(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => 'short',
    ])->assertJsonValidationErrors('password');
});


test('is calling the CreateUserProcess', function () {
    Bus::fake();

    post(route('users.store'), [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => fake()->password,
        'birthday' => fake()->date,
        'position' => fake()->jobTitle,
        'salary' => fake()->randomNumber(4),
    ]);

    Bus::assertDispatchedSync(CreateUserProcess::class);
});
