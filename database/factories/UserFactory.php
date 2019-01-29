<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'screen_name' => $faker->word,
        'role' => $faker->randomElement(['owner', 'non-owner']),
        'gender' => $faker->randomElement(['male', 'female']),
        'age' => $faker->numberBetween($min = 15, $max = 70),
        'street' => $faker->streetAddress,
        'city' => $faker->randomElement(['Berkeley', 'Royal Oak','Clawson','Beverly Hills','Lathrup Village']),
        'state' => 'MI',
        'zip_code' => $faker->randomElement(['48072', '48067','48067','48068','48025']),
        'latitude' => $faker->latitude(-90, 90),
        'longitude' => $faker->longitude(-180, 180),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'image' => $faker->word,
        'provider' => $faker->randomElement(['Facebook', 'Github','LinkedIn']),
        'provider_id' => $faker->numberBetween($min = 15, $max = 70),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
