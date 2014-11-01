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
        'reference'       => '7.e',
        'values'          => array(1954, 6, 30),
        'expected-result' => 3,
        'comment'         => 'Wednesday',
    ),
    array(
        'values'          => array(1582, 10, 4),
        'expected-result' => 4,
        'comment'         => 'Thursday',
    ),
    array(
        'values'          => array(1582, 10, 15),
        'expected-result' => 5,
        'comment'         => 'Friday',
    ),
    array(
        'values'          => array(2012, 9, 16),
        'expected-result' => 0,
        'comment'         => 'Sunday',
    ),
    array(
        'values'          => array(-5000, 1, 1),
        'expected-result' => false,
        'comment'         => 'Invalid date',
    ),
);
