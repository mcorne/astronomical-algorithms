<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * This test must be run with a debuger step by step to fully validate the caching mechanism.
 * This test only validates the first argument that is omega with a coefficient = 1,
 * the calculation of the arguments is however fully validated by the aa-nutation-in-longitude() test
 */

require_once ROOT . '/api/aa-degrees-to-mod360.php';

function calculate_first_argument($time)
{
    $T2 = $time * $time;
    $T3 = $T2 * $time;

    return deg2rad(aa_degrees_to_mod360(125.04452 - 1934.136261 * $time + 0.0020708 * $T2 + $T3 / 450000));
}

function get_first_argument($arguments)
{
    return $arguments[0];
}

return array(
    array(
        'values'          => 1,
        'expected-result' => calculate_first_argument(1),
        'comment'         => 'Nutation arguments, puts to cache, T1',
        'post-processing' => 'get_first_argument',
    ),
    array(
        'values'          => array(2, true),
        'expected-result' => calculate_first_argument(2),
        'comment'         => 'Nutation arguments, puts to cache, T2',
        'post-processing' => 'get_first_argument',
    ),
    array(
        'values'          => 1,
        'expected-result' => calculate_first_argument(1),
        'comment'         => 'Nutation arguments, gets from cache, T1',
        'post-processing' => 'get_first_argument',
    ),
    array(
        'values'          => array(2, false),
        'expected-result' => calculate_first_argument(2),
        'comment'         => 'Nutation arguments, ignores the cache, T2',
        'post-processing' => 'get_first_argument',
    ),
);
