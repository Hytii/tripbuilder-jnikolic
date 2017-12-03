<?php

namespace App\Services\Trips;

use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use Illuminate\Support\Collection;

/**
 * Class TripsService
 *
 * @package App\Services\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class TripsService
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function search(): Collection
    {
        return Trip::orderBy('created_at')
                   ->get();
    }

    /**
     * @param \App\Models\Trips\Trip $trip
     *
     * @return \App\Models\Trips\Trip
     */
    public function store(Trip $trip): Trip
    {
        return $this->save($trip);
    }

    /**
     * @param \App\Models\Trips\Trip $trip
     *
     * @return \App\Models\Trips\Trip
     */
    public function update(Trip $trip): Trip
    {
        return $this->save($trip);

    }

    /**
     * @param \App\Models\Trips\Trip $trip
     *
     * @return bool
     */
    public function destroy(Trip $trip)
    {
        return $trip->delete();
    }

    /**
     * @param \App\Models\Trips\Trip $trip
     *
     * @return \App\Models\Trips\Trip
     */
    private function save(Trip $trip): Trip
    {
        $trip->save();

        return $trip;
    }
}