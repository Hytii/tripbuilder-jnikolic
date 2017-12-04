<?php

namespace App\Services\Trips;

use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use Illuminate\Support\Collection;

/**
 * Class FlightsService
 *
 * @package App\Services\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class FlightsService
{

    //******************************
    //region//*** PUBLIC FUNCTIONS
    //******************************

    /**
     * Flights collection for specified trip
     *
     * @param \App\Models\Trips\Trip $trip
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(Trip $trip): Collection
    {
        return $trip->flights()
                    ->get();
    }

    /**
     * Store Flight for specified Trip
     *
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \App\Models\Trips\Flight
     */
    public function store(Trip $trip, Flight $flight): Flight
    {
        $this->genNumber($flight);
        $flight->trip_id = $trip->id;

        return $this->save($trip, $flight);

    }

    /**
     * Destroy Flight
     *
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return bool
     */
    public function destroy(Trip $trip, Flight $flight): bool
    {
        return $flight->delete();
    }

    //endregion
    //******************************

    //******************************
    //region//*** PRIVATE FUNCTIONS
    //******************************

    /**
     * Save Flight information (Create or Update)
     *
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \App\Models\Trips\Flight
     */
    private function save(Trip $trip, Flight $flight): Flight
    {
        $flight->save();

        return Flight::find($flight->id);
    }

    /**
     * Generate Flight number
     *
     * @param \App\Models\Trips\Flight $flight
     */
    private function genNumber(Flight $flight)
    {
        $flight->number = 'FL'.rand(1, 9000);
    }
    //endregion
    //******************************
}
