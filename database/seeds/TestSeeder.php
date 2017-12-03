<?php

use App\Models\Trips\Airport;
use Illuminate\Database\Seeder;

/**
 * Class TestSeeder
 *
 * @author Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class TestSeeder extends Seeder
{

    public function run()
    {
        factory(Airport::class, 50)->create();
    }
}