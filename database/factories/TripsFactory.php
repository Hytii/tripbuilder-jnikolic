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
        'code' => $faker->unique()
                        ->lexify('???'),
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

$factory->state(Flight::class, 'code', function (Faker $faker) {
    return [
        'to'   => Airport::count() > 0 ? Airport::inRandomOrder()
                                                ->first()->code : null,
        'from' => Airport::count() > 0 ? Airport::inRandomOrder()
                                                ->first()->code : null,
    ];
});