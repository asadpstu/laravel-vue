<?php

use Faker\Generator as Faker;

$factory->define(App\Song\AllSong::class, function (Faker $faker) {
    return [
        //
        'song_name' => 'Title -'.rand(100,300),
        'singer_id' =>  rand(1,5),
        'album_id'  =>  rand(1,89),
        'duration'  =>  number_format((float)rand(41,61)/10, 2, '.', ''),
        'release_year' => rand(2014,2018)
        
    ];
});
