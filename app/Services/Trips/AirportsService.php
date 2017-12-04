<?php

namespace App\Services\Trips;

use App\Models\Trips\Airport;
use App\Traits\DbTransactionnable;
use Illuminate\Support\Collection;

/**
 * Class AirportsService
 *
 * @package App\Services\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class AirportsService
{

    use DbTransactionnable;

    /**
     * Collection of Airports ordered alphabetically
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(): Collection
    {
        return Airport::orderBy('name')
                      ->get();
    }

    /**
     * Refresh airport table content with array collection of airport data
     *
     * @param array $airports
     *
     * @throws \Exception
     */
    public function refresh($airports = array())
    {
        try {
            $this->openTransaction();

            foreach ( $airports as $airport_data ) {
                $airport = Airport::firstOrNew([ 'code' => $airport_data['code'] ]);

                $airport->name = $airport_data['name'];
                $this->save($airport);
            }

            $this->commitTransaction();
        } catch (\Exception $ex) {
            $this->rollbackTransaction();
            throw $ex;
        }

    }

    /**
     * Find Airport via specified Iata code
     *
     * @param $code
     *
     * @return mixed
     */
    public function getByCode($code)
    {
        return Airport::where('code', $code)
                      ->first();
    }

    /**
     * Save Airport information (Create or Update)
     *
     * @param \App\Models\Trips\Airport $airport
     */
    private function save(Airport $airport)
    {
        $airport->save();
    }
}