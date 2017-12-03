<?php

namespace App\Http\Requests\Api\Trips;

use App\Models\Trips\Trip;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTripsRequest
 *
 * @package Http\Requests\Api
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class StoreTripsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Trip)->getRules();
    }
}