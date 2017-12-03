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
        'code' => strtoupper(substr(md5(microtime()), rand(0, 26), 3)),
        'name' => $faker->colorName(),
    ];
});

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'to_id'   => Airport::count() > 0 ? Airport::inRandomOrder()
                                                   ->first()->id : null,
        'from_id' => Airport::count() > 0 ? Airport::inRandomOrder()
                                                   ->first()->id : null,
    ];
});