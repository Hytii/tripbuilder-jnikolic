<?php

namespace App\Http\Requests\Api\Trips;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexTripsRequest
 *
 * @package Http\Requests\Api
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class IndexTripsRequest extends FormRequest
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