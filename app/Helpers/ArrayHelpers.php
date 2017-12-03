<?php
if ( ! function_exists('array_prefix_keys')) {

    /**
     * Prefix all keys with prefix and use glue
     *
     * @param        $arr
     * @param        $prefix
     * @param string $glue
     *
     * @return array
     */
    function array_prefix_keys($arr, $prefix, $glue = '')
    {
        $arr_prefixed = [];
        foreach ( $arr as $k => $v ) {
            if ($prefix !== null) {
                $arr_prefixed[ $prefix.$glue.$k ] = $v;
            } else {
                $arr_prefixed[ $k ] = $v;
            }
        }

        return $arr_prefixed;
    }
}
