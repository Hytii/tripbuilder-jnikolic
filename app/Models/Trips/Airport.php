<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Airport
 *
 * @package Models\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class Airport extends Model
{

    use TBModelable;

    //******************************
    //region//*** ATTRIBUTES
    //******************************

    //endregion
    //******************************

    //******************************
    //region//*** RELATIONSHIPS
    //******************************

    public function flightsFrom()
    {
        return $this->hasMany(Flight::class, 'from_id');
    }

    public function flightTo()
    {
        return $this->hasMany(Flight::class, 'to_id');
    }

    //endregion
    //******************************
}