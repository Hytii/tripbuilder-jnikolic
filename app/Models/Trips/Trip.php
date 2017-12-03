<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use App\Traits\Validable;
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

    use TBModelable, Validable;

    //******************************
    //region//*** ATTRIBUTES
    //******************************
    protected $fillable = [
        'number',
    ];

    protected $rules = [
        'number' => 'required|max:255|string',
    ];

    //endregion
    //******************************

    //******************************
    //region//*** RELATIONSHIPS
    //******************************
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
    //endregion
    //******************************
}