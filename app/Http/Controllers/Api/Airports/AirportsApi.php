<?php

namespace App\Http\Controllers\Api\Airports;

use App\Http\Controllers\Api\ApiController;
use App\Services\Trips\AirportsService;
use App\Http\Requests\Api\IndexAirportsRequest;

/**
 * Class AirportsController
 *
 * @package App\Http\Controllers\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class AirportsApi extends ApiController
{

    /**
     * @var \App\Services\Trips\AirportsService
     */
    private $airportsService;

    /**
     * AirportsApi constructor.
     *
     * @param \App\Services\Trips\AirportsService $airportsService
     */
    public function __construct(AirportsService $airportsService)
    {

        $this->airportsService = $airportsService;
    }

    /**
     *
     * @param \App\Http\Requests\Api\IndexAirportsRequest $request
     *
     * @return string
     */
    public function index(IndexAirportsRequest $request)
    {
        return $this->airportsService->search()
                                     ->toJson();
    }
}