<?php

namespace Libs\IataCode;

use function key_exists;

/**
 * Class IataCodeSdk
 * http://iatacodes.org/
 *
 * Created based on:
 * https://github.com/iatacodes/php-sdk/blob/master/IataCodes.php
 *
 *
 * @package Libs\IataCode
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class IataCodeSdk
{

    /**
     * @var mixed
     */
    private $api_key;

    /**
     * @var mixed|string
     */
    private $version = "6";

    /**
     * @var mixed|string
     */
    private $api_url = "http://iatacodes.org/api/";

    /**
     * IataCodeSdk constructor.
     *
     * @param string $api_key
     * @param string $version
     */
    public function __construct($api_key = "", $version = "1")
    {
        $this->api_key = $api_key ?: env('IATA_CODE_API_KEY');
        $this->version = $version ?: env('IATA_CODE_API_VERSION');
        $this->api_url = $api_key ?: env('IATA_CODE_API_URL');

    }

    /**
     * @param       $method
     * @param array $params
     *
     * @return \Libs\IataCode\IataCodeResult
     */
    public function api($method, $params = array()): IataCodeResult
    {
        $url = $this->api_url."v".$this->version."/".$method."?".http_build_query(array_merge(array( "api_key" => $this->api_key ),
                $params));
        try {
            $result = json_decode(file_get_contents($url), true);
        } catch (\Exception $ex) {
            $result = [ 'error' => [ 'message' => $ex->getMessage() ] ];

        }

        return $this->cast($result);
    }

    /**
     * Get Airports list
     *
     * @param array $params Filter for list
     *
     * @return \Libs\IataCode\IataCodeResult
     */
    public function airports($params = array()): IataCodeResult
    {
        return $this->api('airports', $params);
    }

    /**
     * Get Countries list
     *
     * @param array $params Filter for list
     *
     * @return \Libs\IataCode\IataCodeResult
     */
    public function countries($params = array()): IataCodeResult
    {
        return $this->api('countries', $params);
    }

    /**
     * Get Cities list
     *
     * @param array $params Filter for list
     *
     * @return \Libs\IataCode\IataCodeResult
     */
    public function cities($params = []): IataCodeResult
    {
        return $this->api('cities', $params);
    }

    /**
     * @param array $response
     *
     * @return \Libs\IataCode\IataCodeResult
     */
    protected function cast($response = array()): IataCodeResult
    {
        return new IataCodeResult($response);
    }
}