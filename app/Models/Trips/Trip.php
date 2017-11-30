<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Trip
 *
 * @package App\Models\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class Trip extends Model
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
    public function flights()
    {
        return $this->belongsToMany(Flight::class)
                    ->withTimestamps();
    }
    //endregion
    //******************************
}