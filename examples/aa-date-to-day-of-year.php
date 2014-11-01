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
        'reference'       => '7.f',
        'values'          => array(1978, 11, 14),
        'expected-result' => 318,
        'comment'         => 'Day of the year in 1978, a common year',
    ),
    array(
        'reference'       => '7.g',
        'values'          => array(1988, 4, 22),
        'expected-result' => 113,
        'comment'         => 'Day of the year in 1988, a leap year',
    ),
    array(
        'values'          => array(2000, 12, 31),
        'expected-result' => 366,
        'comment'         => 'Day of the year in 2000, a leap year',
    ),
    array(
        'values'          => array(1999, 12, 31),
        'expected-result' => 365,
        'comment'         => 'Day of the year in 1999, a common year',
    ),
);
