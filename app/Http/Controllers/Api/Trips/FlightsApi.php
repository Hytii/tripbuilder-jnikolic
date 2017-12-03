<?php

namespace App\Http\Controllers\Api\Trips;

use App\Http\Controllers\Api\ApiController;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use App\Services\Trips\FlightsService;
use App\Http\Requests\Api\Trips\Flights\DestroyFlightRequest;
use App\Http\Requests\Api\Trips\Flights\IndexFlightsRequest;
use App\Http\Requests\Api\Trips\Flights\ShowFlightRequest;
use App\Http\Requests\Api\Trips\Flights\StoreFlightRequest;
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
     * @param \App\Http\Requests\Api\Trips\Flights\IndexFlightsRequest $request
     * @param \App\Models\Trips\Trip                                   $trip
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(IndexFlightsRequest $request, Trip $trip)
    {
        return $trip->flights()
                    ->get();
    }

    /**
     * @param \App\Http\Requests\Api\Trips\Flights\ShowFlightRequest $request
     * @param \App\Models\Trips\Trip                                 $trip
     * @param \App\Models\Trips\Flight                               $flight
     *
     * @return \App\Models\Trips\Flight
     */
    public function show(ShowFlightRequest $request, Trip $trip, Flight $flight)
    {
        return $flight;
    }

    /**
     * @param \App\Http\Requests\Api\Trips\Flights\StoreFlightRequest $request
     * @param \App\Models\Trips\Trip                                  $trip
     *
     * @return mixed
     */
    public function store(StoreFlightRequest $request, Trip $trip)
    {
        $flight = new Flight($request->input());

        return $this->flightsService->store($trip, $flight);
    }

    /**
     * @param \App\Http\Requests\Api\Trips\Flights\DestroyFlightRequest $request
     * @param \App\Models\Trips\Trip                                    $trip
     * @param \App\Models\Trips\Flight                                  $flight
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyFlightRequest $request, Trip $trip, Flight $flight)
    {
        $this->flightsService->destroy($trip, $flight);

        return response()->json([]);
    }

}