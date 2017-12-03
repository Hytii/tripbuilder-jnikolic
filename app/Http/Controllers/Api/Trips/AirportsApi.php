<?php

namespace App\Http\Controllers\Api\Trips;

use App\Http\Controllers\Api\ApiController;
use App\Services\Trips\AirportsService;

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

    public function __construct(AirportsService $airportsService)
    {

        $this->airportsService = $airportsService;
    }

    public function index()
    {
        return $this->airportsService->search()
                                     ->toJson();
    }
}