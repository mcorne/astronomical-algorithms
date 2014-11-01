<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * Functions used by the controller
 */

/**
 * Combines parameter names and values
 *
 * @param  array $params
 * @param  array $values
 * @return array
 */
function combine_params_and_values($params, $values)
{
    settype($values, 'array');
    $combined = array();

    foreach($params as $index => $param) {
        if (isset($values[$index])) {
             $combined[$param] = $values[$index];
        }
    }

    return $combined;
}

/**
 * Fills missing params to be passed or displayed
 *
 * @param  array $params
 * @param  array $values
 * @return array
 */
function fill_missing_params($params, $values)
{
    $params = array_reverse($params);
    $values_to_display = array();
    $values_to_pass = array();
    $has_values = false;

    foreach($params as $param) {
        if (array_key_exists($param, $values)) {
            $has_values = true;
            $values_to_display[$param] = $values[$param];
            $values_to_pass[$param]    = $values[$param];

        } else if ($has_values) {
            // the param is missing but there is one or more set params after
            $values_to_display[$param] = null;
            $values_to_pass[$param]    = null;

        } else {
            // the param is missing
            $values_to_display[$param] = null;
        }
    }

    $values_to_display = array_reverse($values_to_display, true);
    $values_to_pass    = array_reverse($values_to_pass, true);

    return array($values_to_display, $values_to_pass);
}

/**
 * Filters the parameters
 *
 * @param  array $params
 * @param  array $posted_params
 * @return array
 */
function filter_params($params, $posted_params)
{
    $values = array();

    foreach($params as $param) {
        if (isset($posted_params[$param]) and $posted_params[$param] !== '') {
            $values[$param] = filter_value($posted_params[$param]);
        }
    }

    return $values;
}

/**
 * Filters a value
 *
 * @param  string              $value
 * @return string|boolean|null
 */
function filter_value($value)
{
    switch($value) {
        case 'null':
        case 'NULL':
            $value = null;
            break;

        case 'false':
        case 'FALSE':
            $value = false;
            break;

        case 'true':
        case 'TRUE':
            $value = true;
            break;
    }

    return $value;
}

/**
 * Returns the action
 *
 * @param  array       $posted_params
 * @return string|null
 */
function get_action($posted_params)
{
    static $valid_actions = array('calculate', 'options', 'test', 'tests');

    if (! isset($posted_params['command']) or ! in_array($posted_params['command'], $valid_actions)) {
       return null;
    }

    return $posted_params['command'];
}

/**
 * Returns the selected algorithm
 *
 * @param  array       $posted_params
 * @param  arary       $algorithms
 * @return string|null
 */
function get_algorithm($posted_params, $algorithms)
{
    if (! isset($posted_params['algorithm']) or ! isset($algorithms[$posted_params['algorithm']])) {
        return null;
    }

    return $posted_params['algorithm'];
}

/**
 * Returns parameters values from the example, or posted or the default values
 *
 * @param  string $algorithm
 * @param  string $source_code
 * @param  array  $posted_params
 * @param  array  $examples
 * @param  string $filename
 * @return array
 */
function get_param_values($algorithm, $source_code, $posted_params, $examples, $filename)
{
    $params = get_params($algorithm, $source_code);

    if (empty($params)) {
        $values = array();

    } else if (isset($posted_params['example']) and isset($examples[$posted_params['example']])) {
        $values = combine_params_and_values($params, $examples[$posted_params['example']]['values']);

    } else if (! $values = filter_params($params, $posted_params)) {
        $values = get_defaults($params, $filename);
    }

    return fill_missing_params($params, $values);
}

/**
 * Returns the posted parameters
 *
 * @return array
 */
function get_posted_params()
{
    return !empty($_POST)? $_POST : $_GET;
}

/**
 * Restores the properties saved in cookies
 *
 * @return array
 */
function restore_properties()
{
    $properties = require ROOT . "/defaults/properties.php";

    foreach($properties as $property) {
        if (isset($_COOKIE[$property])) {
            $GLOBALS[$property] = $_COOKIE[$property];
        }
    }

    return $properties;
}

/**
 * Saves some properties in cookies
 *
 * @param array $properties
 */
function save_properties($properties)
{
    foreach($properties as $property) {
        if (isset($GLOBALS[$property])) {
            setcookie($property, $GLOBALS[$property]);
        }
    }
}
