<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use App\Traits\Validable;
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

    use TBModelable, Validable;

    //******************************
    //region//*** ATTRIBUTES
    //******************************
    protected $fillable = [ 'code', 'name' ];

    protected $rules = [
        'name' => 'required|max:255|string',
        'code' => 'required|max:3|min:3|string',
    ];

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