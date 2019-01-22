<?php

use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 6),
        'type' => $faker->randomElement(['dog', 'cat', 'horse', 'bird', 'rabbit','ferret','fish','reptile']),
        'breed' => $faker->randomElement(['Bulldog', 'Poodle','German Shepard','Beagle','Retriever','Pug','Greyhound','Rottweiler','Yorky']),
        'name' => $faker->name,
        'description' => $faker->realText(),
        'latitude' => $faker->latitude(-90, 90),
        'longitude' => $faker->longitude($min = -180, $max = 180),
    ];
});
