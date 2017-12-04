<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use App\Traits\Validable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * Class Trip
 *
 * @package App\Models\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class Trip extends Model
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
    protected $fillable = [ 'number' ];

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'number' => 'required|max:255|string',
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
        return 'number';
    }


    //endregion
    //******************************

    //******************************
    //region//*** RELATIONSHIPS
    //******************************

    /**
     * HasMany Flights relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    //endregion
    //******************************
}