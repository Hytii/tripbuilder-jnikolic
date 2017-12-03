<?php

namespace App\Http\Controllers\Api\Trips;

use App\Http\Controllers\Api\ApiController;
use App\Models\Trips\Flight;
use App\Models\Trips\Trip;
use App\Services\Trips\TripsService;
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

    public function __construct(TripsService $tripsService)
    {

        $this->tripsService = $tripsService;
    }

    public function index()
    {
        return $this->tripsService->search();
    }

    public function show(Trip $trip)
    {
        return $trip;
    }

    public function store(Request $request)
    {
        $trip = new Trip($request->input());

        return $this->tripsService->store($trip);
    }

    public function update(Request $request, Trip $trip)
    {
        $trip->fill($request->input());

        $trip = $this->tripsService->update($trip);

        return response()->json($trip->toJson());
    }

    public function destroy(Trip $trip)
    {
        $this->tripsService->destroy($trip);

        return response()->json();
    }
}