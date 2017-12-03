<?php

use App\Models\Trips\Airport;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use Faker\Generator as Faker;

$factory->define(Trip::class, function (Faker $faker) {
    return [
        'number' => 'TR'.$faker->randomNumber(5),
    ];
});

$factory->define(Airport::class, function (Faker $faker) {
    return [
        'iata_code' => $faker->text(3),
    ];
});

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'to_id'   => Airport::count() ? Airport::inRandomOrder()
                                               ->first()->id : null,
        'from_id' => Airport::count() ? Airport::inRandomOrder()
                                               ->first()->id : null,
    ];
});