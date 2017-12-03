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
     * Get Collection of Airports ordered alphabetically
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(): Collection
    {
        return Airport::orderBy('name')
                      ->get();
    }

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

    private function save(Airport $airport)
    {
        $airport->save();
    }
}