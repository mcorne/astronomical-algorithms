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
        'reference'       => '22.a',
        'values'          => array(1987, 4, 10),
        'expected-result' => 9.443,
        'comment'         => 'Nutation in obliquity for a date',
        'precision'       => 3,
    ),
    array(
        'reference'       => '22.a',
        'values'          => array(2446895.5, false),
        'expected-result' => 9.443,
        'comment'         => 'Nutation in obliquity for a Julian day',
        'precision'       => 3,
    ),
    array(
        'values'          => array(-5000, 1, 1),
        'expected-result' => false,
        'comment'         => 'Invalid Julian day',
    ),
    array(
        'reference'       => '22.a',
        'values'          => array(1987, 4, 10, null, null, null, 'DEGREES'),
        'expected-result' => round(9.443 / 3600, 6),
        'comment'         => 'Nutation in obliquity for a date in degrees',
        'precision'       => 6,
    ),
);
