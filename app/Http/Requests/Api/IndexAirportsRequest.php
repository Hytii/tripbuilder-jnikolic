<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AirportsIndexRequest
 *
 * @package Http\Requests\Api
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class IndexAirportsRequest extends FormRequest
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