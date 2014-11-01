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
        'values'          => array(30, 30, 0),
        'expected-result' => 30.5,
        'comment'         => 'Positive degrees',
    ),
    array(
        'values'          => array(30, 30, 0, false),
        'expected-result' => -30.5,
        'comment'         => 'Negative degrees',
    ),
    array(
        'values'          => array(30.5),
        'expected-result' => 30.5,
        'comment'         => 'Decimal degrees',
    ),
    array(
        'values'          => array(0, 30.3),
        'expected-result' => 0.505,
        'comment'         => 'Decimal minutes',
    ),
);
