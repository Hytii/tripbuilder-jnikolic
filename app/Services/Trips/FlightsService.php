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
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \App\Models\Trips\Flight
     */
    public function store(Trip $trip, Flight $flight): Flight
    {
        $this->genNumber($flight);
        $flight->trip_id = $trip->id;
        $flight->save();

        return $flight;
    }

    /**
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \App\Models\Trips\Flight
     */
    public function update(Trip $trip, Flight $flight): Flight
    {
        $this->save($trip, $flight);

        return $flight;
    }

    /**
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return bool
     */
    public function destroy(Trip $trip, Flight $flight): bool
    {
        $trip->flights()
             ->detach($flight);

        return $flight->delete();
    }

    //endregion
    //******************************

    //******************************
    //region//*** PRIVATE FUNCTIONS
    //******************************

    /**
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \App\Models\Trips\Flight
     */
    private function save(Trip $trip, Flight $flight): Flight
    {
        $flight->save();

        return $flight;
    }

    /**
     * @param \App\Models\Trips\Flight $flight
     */
    private function genNumber(Flight $flight)
    {
        $flight->number = 'TR'.rand(1, 9000);
    }
    //endregion
    //******************************
}
