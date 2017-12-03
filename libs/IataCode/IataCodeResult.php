<?php

namespace Libs\IataCode;

use function key_exists;
use function parseArgs;

/**
 * Class IataCodeResult
 *
 * @package Libs\IataCode
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class IataCodeResult
{

    protected $raw;

    protected $request_info = array();

    protected $response = array();

    protected $error = array();

    public function __construct($raw_response = [])
    {
        $this->raw = $raw_response;
        $this->parseRaw();
    }

    protected function parseRaw()
    {
        if (key_exists('error', $this->raw)) {
            $this->error = $this->raw['error'];

            return;
        }
        $this->request_info = $this->raw['request'];
        $this->response = $this->raw['response'];
    }

    public function requestInfo()
    {
        return $this->request_info;
    }

    public function response()
    {
        return $this->response;
    }

    public function error()
    {
        return $this->error;
    }

    public function hasError()
    {
        return $this->error !== [];
    }
}