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
        'reference'       => '7.c',
        'values'          => 2436116.31,
        'expected-result' => array(1957, 10, 4.81),
        'precision' => array(null, null, 2),
        'comment'         => 'Julian day of a date in the Gregorian calendar',
    ),
    array(
        'values'          => -10,
        'expected-result' => false,
        'comment'         => 'Invalid julian day',
    ),
    array(
        'reference'       => '7.p.64',
        'values'          => 1842713.0,
        'expected-result' => array(333, 1, 27.5),
        'comment'         => 'Julian day of a date in the Julian calendar',
    ),
    array(
        'reference'       => '7.p.64',
        'values'          => 1507900.13,
        'expected-result' => array(-584, 5, 28.63),
        'precision' => array(null, null, 2),
        'comment'         => 'Julian day of a date in the Gregorian calendar, negative year',
    ),
);
