<?php

use Faker\Generator as Faker;

$factory->define(App\Song\Singer::class, function (Faker $faker) {
    return [
        //
        'singer_name' => 'Sg-'.rand(1,50),
        'country'     => $faker->country,
        'carrier_start_year' => rand(2015,2018)
    ];
});
