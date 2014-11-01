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
        'values'          => array(2000, 1, 1),
        'expected-result' => true,
        'comment'         => 'Year in the Gregorian calendar',
    ),
    array(
        'values'          => array(1500, 1, 1),
        'expected-result' => false,
        'comment'         => 'Year in the Julian calendar',
    ),
    array(
        'values'          => array(1582, 12, 1),
        'expected-result' => true,
        'comment'         => 'A month of the year 1582 in the Gregorian calendar',
    ),
    array(
        'values'          => array(1582, 1, 1),
        'expected-result' => false,
        'comment'         => 'A month of the year 1582 in the Julian calendar',
    ),
    array(
        'values'          => array(1582, 10, 15),
        'expected-result' => true,
        'comment'         => 'A day of the year 1582 in the Gregorian calendar',
    ),
    array(
        'values'          => array(1582, 10, 1),
        'expected-result' => false,
        'comment'         => 'A day of the year 1582 in the Julian calendar',
    ),
);
