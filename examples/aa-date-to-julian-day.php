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
        'comment'         => 'The Julian day of a Gregorian date',
    ),
    array(
        'reference'       => '7.b',
        'values'          => array(333, 1, 27.5),
        'expected-result' => 1842713.0,
        'comment'         => 'The Julian day of a Julian date',
    ),
);
