<?php

namespace Tests\Feature\Trips;

use App\Models\Trips\Trip;
use App\Services\Trips\TripsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class TripsTest
 *
 * @package Tests\Feature\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class TripsTest extends TestCase
{

    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->json('GET', route('trips.index'));

        $response->assertStatus(200)
                 ->assertJson(Trip::all()
                                  ->toArray());
    }

    public function testStore()
    {
        $trip = factory(Trip::class)->make();

        $response = $this->json('POST', route('trips.store'), $trip->toArray());

        $response->assertStatus(200);

        $trip = Trip::where('number', $response->json()['number']);

        $this->assertNotNull($trip);
    }

    public function testShow()
    {
        $trip = factory(Trip::class)->create();

        $response = $this->json('GET', route('trips.show', [ $trip ]));

        $response->assertStatus(200)
                 ->assertJson($trip->toArray());
    }

    public function testUpdate()
    {
        $trip = factory(Trip::class)->create();

        $new_data = [ 'number' => 'TR9000' ];

        $response = $this->json('PATCH', route('trips.update', [ $trip ]), $new_data);

        $trip = Trip::find($trip->id);

        $response->assertStatus(200);
        $this->assertNotNull($trip);
        $this->assertTrue($trip->number == $new_data['number']);
    }

    public function testDestroy()
    {
        $trip = factory(Trip::class)->create();

        $response = $this->json('DELETE', route('trips.destroy', [ $trip ]));

        $trip = Trip::find($trip->id);

        $response->assertStatus(200);

        $this->assertNull($trip);
    }
}