<?php

namespace App\Http\Requests\Api\Trips\Flights;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DestroyFlightRequest
 *
 * @package Http\Requests\Api\Trips\Flights
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class DestroyFlightRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}