<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flight
 *
 * @package App\Models\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class Flight extends Model
{

    use TBModelable;

    //******************************
    //region//*** ATTRIBUTES
    //******************************
    protected $fillable = [
        'to_id',
        'from_id',
    ];

    //endregion
    //******************************

    //******************************
    //region//*** RELATIONSHIPS
    //******************************
    public function trips()
    {
        return $this->belongsTo(Trip::class);
    }

    public function from()
    {
        return $this->belongsTo(Airport::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Airport::class, 'to_id');
    }
    //endregion
    //******************************

}