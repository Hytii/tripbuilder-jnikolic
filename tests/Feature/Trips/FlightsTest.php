<?php

namespace Tests\Feature\Trips;

use App\Models\Trips\Airport;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use App\Services\Trips\FlightsService;
use function factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class FlightsTest
 *
 * @package Tests\Feature\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class FlightsTest extends TestCase
{

    use RefreshDatabase;

    public function testIndex()
    {
        $trip = $this->createTrip();

        $flight = factory(Flight::class)->make();
        (new FlightsService)->store($trip, $flight);
        (new FlightsService)->store($trip, $flight);
        (new FlightsService)->store($trip, $flight);

        $response = $this->json('GET', route('trips.flights.index', [ $trip ]));

        $response->assertStatus(200)
                 ->assertJson(Flight::all()
                                    ->toArray());

    }

    public function testStore()
    {
        $trip = $this->createTrip();
        $flight = factory(Flight::class)->make();

        $response = $this->json('POST', route('trips.flights.store', [ $trip ]), $flight->toArray());

        $response->assertStatus(200)
                 ->assertJson($trip->flights()
                                   ->first()
                                   ->toArray());
    }

    public function testShow()
    {
        $trip = $this->createTrip();
        $flight = factory(Flight::class)->make();
        $flight = (new FlightsService)->store($trip, $flight);

        $response = $this->json('GET', route('trips.flights.show', [ $trip, $flight ]));

        $response->assertStatus(200)
                 ->assertJson($trip->flights()
                                   ->first()
                                   ->toArray());

    }

    public function testDestroy()
    {
        $trip = $this->createTrip();
        $flight = factory(Flight::class)->make();
        $flight = (new FlightsService)->store($trip, $flight);

        $response = $this->json('DELETE', route('trips.flights.destroy', [ $trip, $flight ]));

        $response->assertStatus(200);

        $flight = Flight::find($flight->id);

        $this->assertNull($flight);
    }

    private function createTrip()
    {
        return factory(Trip::class)->create();
    }
}