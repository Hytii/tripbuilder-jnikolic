<?php

namespace App\Http\Controllers\Api\Trips;

use App\Http\Controllers\Api\ApiController;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use App\Services\Trips\FlightsService;
use Illuminate\Http\Request;

/**
 * Class FlightsApi
 *
 * @package App\Http\Apis\Endpoints\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class FlightsApi extends ApiController
{

    /**
     * @var \App\Services\Trips\FlightsService
     */
    private $flightsService;

    /**
     * FlightsApi constructor.
     *
     * @param \App\Services\Trips\FlightsService $flightsService
     */
    public function __construct(FlightsService $flightsService)
    {

        $this->flightsService = $flightsService;
    }

    /**
     * @param \App\Models\Trips\Trip $trip
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Trip $trip)
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
    public function show(Trip $trip, Flight $flight)
    {
        return $flight;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trips\Trip   $trip
     *
     * @return mixed
     */
    public function store(Request $request, Trip $trip)
    {
        $flight = new Flight($request->input());

        return $this->flightsService->store($trip, $flight);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return mixed
     */
    public function update(Request $request, Trip $trip, Flight $flight)
    {
        $flight->fill($request->input());

        return $this->flightsService->update($trip, $flight);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trips\Trip   $trip
     * @param \App\Models\Trips\Flight $flight
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Trip $trip, Flight $flight)
    {
        $this->flightsService->destroy($trip, $flight);

        return response()->json([]);
    }

}