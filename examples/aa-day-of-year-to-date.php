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
        'reference'       => '7.p.66',
        'values'          => array(1978, 318),
        'expected-result' => array(1978, 11, 14),
        'comment'         => 'Date for a day in 1978, a common year',
    ),
    array(
        'reference'       => '7.p.66',
        'values'          => array(1988, 113),
        'expected-result' => array(1988, 4, 22),
        'comment'         => 'Date for a day in 1988, a leap year',
    ),
    array(
        'values'          => array(2000, 366),
        'expected-result' => array(2000, 12, 31),
        'comment'         => 'Date for a day in 2000, a leap year',
    ),
    array(
        'values'          => array(1999, 365),
        'expected-result' => array(1999, 12, 31),
        'comment'         => 'Date for a day in 1999, a common year',
    ),
);
