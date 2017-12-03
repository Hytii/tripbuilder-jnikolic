<?php

namespace App\Http\Controllers\Api\Trips;

use App\Http\Controllers\Api\ApiController;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use App\Services\Trips\TripsService;
use App\Http\Requests\Api\Trips\DestroyTripsRequest;
use App\Http\Requests\Api\Trips\IndexTripsRequest;
use App\Http\Requests\Api\Trips\ShowTripsRequest;
use App\Http\Requests\Api\Trips\StoreTripsRequest;
use App\Http\Requests\Api\Trips\UpdateTripsRequest;
use Illuminate\Http\Request;
use function response;

/**
 * Class TripsController
 *
 * @package App\Http\Controllers\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class TripsApi extends ApiController
{

    /**
     * @var \App\Services\Trips\TripsService
     */
    private $tripsService;

    /**
     * TripsApi constructor.
     *
     * @param \App\Services\Trips\TripsService $tripsService
     */
    public function __construct(TripsService $tripsService)
    {

        $this->tripsService = $tripsService;
    }

    /**
     * @param \App\Http\Requests\Api\Trips\IndexTripsRequest $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(IndexTripsRequest $request)
    {
        return $this->tripsService->search();
    }

    /**
     * @param \App\Http\Requests\Api\Trips\ShowTripsRequest $request
     * @param \App\Models\Trips\Trip                    $trip
     *
     * @return \App\Models\Trips\Trip
     */
    public function show(ShowTripsRequest $request, Trip $trip)
    {
        return $trip;
    }

    /**
     *
     * @param \App\Http\Requests\Api\Trips\StoreTripsRequest $request
     *
     * @return \App\Models\Trips\Trip
     */
    public function store(StoreTripsRequest $request)
    {
        $trip = new Trip($request->input());

        return $this->tripsService->store($trip);
    }

    /**
     * @param \App\Http\Requests\Api\Trips\UpdateTripsRequest $request
     * @param \App\Models\Trips\Trip                      $trip
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTripsRequest $request, Trip $trip)
    {
        $trip->fill($request->input());

        $trip = $this->tripsService->update($trip);

        return response()->json($trip->toJson());
    }

    /**
     * @param \App\Http\Requests\Api\Trips\DestroyTripsRequest $request
     * @param \App\Models\Trips\Trip                       $trip
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyTripsRequest $request, Trip $trip)
    {
        $this->tripsService->destroy($trip);

        return response()->json();
    }
}