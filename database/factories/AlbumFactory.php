<?php

use Faker\Generator as Faker;

$factory->define(App\Song\Album::class, function (Faker $faker) {
    return [
        //
        'album_name' => 'Al - '.rand(1,299),
        'singer_id'  =>rand(1,11),
        'album_release_year' =>rand(2014,2018)
    ];
});
