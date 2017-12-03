<?php

namespace App\Http\Requests\Api\Trips\Flights;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexFlightsRequest
 *
 * @package Http\Requests\Api\Trips\Flights
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class IndexFlightsRequest extends FormRequest
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