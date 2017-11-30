<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class WebController
 *
 * @package App\Http\Controllers\WebControllers
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class WebController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}