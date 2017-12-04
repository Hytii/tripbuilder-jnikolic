<?php

namespace App\Traits;

/**
 * Trait Validable
 *
 * @package Traits
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
trait Validable
{

    /**
     * Return rules array and allow to pass prefix, glue and to ignore some of the rules via $except
     *
     * @param array  $except
     * @param string $prefix
     * @param string $glue
     *
     *
     * @return array
     */
    public function getRules($except = [], $prefix = null, $glue = '.')
    {
        $rules = array_filter($this->rules, function ($k) use ($except) {
            return ! in_array($k, $except);
        }, ARRAY_FILTER_USE_KEY);

        $arr_prefixed = array_prefix_keys($rules, $prefix, $glue);

        return $this->prefixRuleParams($arr_prefixed, $prefix, $glue);
    }

    /**
     * Apply prefix to all rules
     *
     * @param array  $rules
     * @param        $prefix
     * @param string $glue
     *
     * @return array
     */
    protected function prefixRuleParams(array $rules, $prefix, $glue = '..')
    {
        foreach ( $rules as $field => &$ruleset ) {
            // If the ruleset is a pipe-delimited string, convert it to an array.
            $ruleset = is_string($ruleset) ? explode('|', $ruleset) : $ruleset;

            foreach ( $ruleset as &$rule ) {
                $parameters = explode(':', $rule);
                $validation_rule = array_shift($parameters);

                if ($method = $this->getPrefixParamMethod($validation_rule)) {
                    $rule = call_user_func_array([ __CLASS__, $method ],
                        [ explode(',', head($parameters)), $field, $prefix, $glue ]);
                }
            }
        }

        return $rules;
    }

    /**
     * Get custom prefix application function name for specified rule if exists
     *
     * @param $validationRule
     *
     * @return bool|string
     */
    protected function getPrefixParamMethod($validationRule)
    {
        $method = 'prefix'.studly_case($validationRule).'Param';

        return method_exists(__CLASS__, $method) ? $method : false;
    }

    /**
     * Apply prefix to required_without params rule
     *
     * @param $parameters
     * @param $field
     * @param $prefix
     * @param $glue
     *
     * @return string
     */
    protected function prefixRequiredWithoutParam($parameters, $field, $prefix, $glue)
    {
        $rule = 'required_without:'.$prefix.$glue.$parameters[0];
        if (count($parameters) > 1) {
            $rule .= ','.join(',', array_slice($parameters, 1));
        }

        return $rule;
    }
}