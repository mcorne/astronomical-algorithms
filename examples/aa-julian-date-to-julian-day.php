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
        'reference'       => '7.b',
        'values'          => array(333, 1, 27.5),
        'expected-result' => 1842713.0,
        'comment'         => 'The Julian day of a date in 333',
    ),
    array(
        'values'          => array(-5000, 1, 1),
        'expected-result' => false,
        'comment'         => 'Invalid date',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(837, 4, 10.3),
        'expected-result' => 2026871.8,
        'comment'         => 'The Julian day of a date in 837',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(-1000, 7, 12.5),
        'expected-result' => 1356001.0,
        'comment'         => 'The Julian day of a date in -1000',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => array(-4712, 1, 1.5),
        'expected-result' => 0.0,
        'comment'         => 'The Julian day of a date in -4712',
    ),
);
