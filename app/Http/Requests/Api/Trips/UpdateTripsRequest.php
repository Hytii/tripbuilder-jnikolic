<?php

namespace App\Http\Requests\Api\Trips;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateTripsRequest
 *
 * @package Http\Requests\Api\Trips
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class UpdateTripsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->route('trip')
                    ->getRules();
    }
}