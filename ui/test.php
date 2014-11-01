<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * Functions used to test the algorithms (the MVC test model)
 */

/**
 * Returns the file names of the algorithm function and examples
 *
 * @param  string $algorithm
 * @return array
 */
function make_file_names($algorithm)
{
    $filename = str_replace('_', '-', $algorithm) . '.php';
    $algorithm_filename = ROOT . "/api/$filename";
    $example_filename = ROOT . "/examples/$filename";

    return array($algorithm_filename, $example_filename);
}

/**
 * Round a test result
 *
 * @param  array|float $result
 * @param  int         $precision
 * @return array|float
 */
function round_result($result, $precision)
{
    if (is_array($result)) {
        $result = array_map(__FUNCTION__, $result, $precision);
    } else if ($precision !== null) {
        $result = round($result, $precision);
    }

    return $result;
}

/**
 *  Runs an action before or after a test
 *
 * @param array|string $action
 */
function run_pre_or_post_test_action($action)
{
    settype($action, 'array');
    $callback = $action[0];
    $params = isset($action[1])? (array)$action[1] : array();
    call_user_func_array($callback, $params);
}

/**
 * Runs actions before or after a test
 *
 * @param array|string $actions
 */
function run_pre_or_post_test_actions($actions)
{
    settype($actions, 'array');

    foreach($actions as $action) {
        run_pre_or_post_test_action($action);
    }
}

/**
 * Tests an algorithm
 *
 * @param  string $algorithm
 * @return array
 */
function test_algorithm($algorithm, $examples = null)
{
    list($algorithm_filename, $example_filename) = make_file_names($algorithm);

    if (! file_exists($example_filename)) {
        return false;
    }

    $results = array();
    $successes = 0;
    $failures = 0;

    require_once $algorithm_filename;
    is_null($examples) and $examples = require $example_filename;

    foreach($examples as $number => $example) {
        $result = test_example($algorithm, $example, $number);

        if ($result === $example['expected-result']) {
            $successes++;
        } else {
            $failures++;
        }

        $results[$number] = $result;
    }

    return array(
        'successes' => $successes,
        'failures'  => $failures,
        'results'   => $results,
    );
}

/**
 * Tests the algorithms
 *
 * @return array
 */
function test_algorithms()
{
    require_once ROOT . '/api/aa-get-algorithms.php';
    $algorithms = aa_get_algorithms();

    $results = array();
    $successes = 0;
    $failures = 0;
    $missing = 0;

    foreach(array_keys($algorithms) as $algorithm) {
        list($algorithm_filename, $example_filename) = make_file_names($algorithm);
        $result = test_algorithm($algorithm);

        if (empty($result)) {
            $missing++;

        } else {
            $successes += $result['successes'];
            $failures += $result['failures'];
        }

        $results[$algorithm] = $result;
    }

    return array(
        'successes' => $successes,
        'failures'  => $failures,
        'missing'   => $missing,
        'results'   => $results,
    );
}

/**
 * Test an algorithm example
 *
 * @param  string $algorithm
 * @param  array  $example
 * @param  int    $number
 * @return mixed
 */
function test_example($algorithm, $example, $number)
{
    if (isset($example['pre-test'])) {
        run_pre_or_post_test_actions($example['pre-test']);
    }

    $result = call_user_func_array($algorithm, (array)$example['values']);

    if (isset($example['post-processing'])) {
        $method = $example['post-processing'];
        $result = $method($result);
    }

    if (isset($example['precision'])) {
        $result = round_result($result, $example['precision']);
    }

    if (isset($example['post-test'])) {
        run_pre_or_post_test_actions($example['post-test']);
    }

    return $result;
}
