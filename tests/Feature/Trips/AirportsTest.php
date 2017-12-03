<?php

namespace Tests\Feature\Trips;

use App\Models\Trips\Airport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class AirportsTest
 *
 * @package Tests\Feature\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class AirportsTest extends TestCase
{

    use RefreshDatabase;

    public function testList()
    {
        $response = $this->json('GET', route('airports.index'));

        $response->assertStatus(200)
                 ->assertJson(Airport::orderBy('name')
                                     ->get()
                                     ->toArray());
    }
}