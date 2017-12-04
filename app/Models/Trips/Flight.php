<?php

namespace App\Models\Trips;

use App\Traits\TBModelable;
use App\Traits\Validable;
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

    use TBModelable, Validable;

    //******************************
    //region//*** ATTRIBUTES
    //******************************

    /**
     * Hidden field for arrays
     *
     * @var array
     */
    protected $hidden = [ 'id', 'trip_id', 'from_id', 'to_id', 'created_at', 'updated_at' ];

    /**
     * Mass assignble fields
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'number'  => 'required|string',
        'trip_id' => 'required|exists:trips,id',
        'to_id'   => 'required|different:from_id|exists:airports,id',
        'from_id' => 'required|different:to_id|exists:airports,id',
    ];

    /**
     * Automatic eager loaded relationships
     *
     * @var array
     */
    protected $with = [
        'from',
        'to',
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
     * BelongsTo Trip relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * BelongsTo Airport relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from()
    {
        return $this->belongsTo(Airport::class, 'from_id');
    }

    /**
     * BelongsTo Airport relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to()
    {
        return $this->belongsTo(Airport::class, 'to_id');
    }
    //endregion
    //******************************

}