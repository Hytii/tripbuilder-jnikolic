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
    /**
     * Hidden field for arrays
     *
     * @var array
     */
    protected $hidden = [ 'id', 'created_at', 'updated_at' ];

    /**
     * Mass assignble fields
     *
     * @var array
     */
    protected $fillable = [ 'code', 'name' ];

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:255|string',
        'code' => 'required|max:3|min:3|string',
    ];

    //endregion
    //******************************

    //******************************
    //region//*** SETTINGS
    //******************************
    /**
     * Route key used for binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }
    //endregion
    //******************************

    //******************************
    //region//*** RELATIONSHIPS
    //******************************
    /**
     * HasMany relationships to Flights flying from it
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flightsFrom()
    {
        return $this->hasMany(Flight::class, 'from_id');
    }

    /**
     * HasMany relationships to Flights flying to it
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flightTo()
    {
        return $this->hasMany(Flight::class, 'to_id');
    }

    //endregion
    //******************************
}