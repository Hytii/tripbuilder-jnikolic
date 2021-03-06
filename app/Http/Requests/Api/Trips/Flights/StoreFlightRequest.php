<?php

namespace App\Http\Requests\Api\Trips\Flights;

use App\Models\Trips\Flight;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreFlightRequest
 *
 * @package Http\Requests\Api\Trips\Flights
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class StoreFlightRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'to'   => 'required|different:from|exists:airports,code',
            'from' => 'required|different:to|exists:airports,code',
        ];
    }
}