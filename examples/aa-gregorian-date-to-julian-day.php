<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

return array(
    array(
        'reference'       => '7.a',
        'values'          => array(1957, 10, 4.81),
        'expected-result' => 2436116.31,
        'comment'         => 'The Julian day of a date in 1957',
    ),
    array(
        'values'          => array(-5000, 1, 1),
        'expected-result' => false,
        'comment'         => 'Invalid date',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(2000, 1, 1.5),
        'expected-result' => 2451545.0,
        'comment'         => 'The Julian day of a date in 2000',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(1987, 1, 27),
        'expected-result' => 2446822.5,
        'comment'         => 'The Julian day of a date in 1987',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(1987, 6, 19.5),
        'expected-result' => 2446966.0,
        'comment'         => 'The Julian day of a date in 1987',
    ),
);
