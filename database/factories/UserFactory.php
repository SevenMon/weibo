<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$zKQtVQhCzjemVqE8xoGmqu9J0zQo/byQmSw07BbHk5wJek7y7GvB6', // secret
        'remember_token' => Str::random(10),
        'activation_token' => Str::random(10),
        'activation' => true,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
