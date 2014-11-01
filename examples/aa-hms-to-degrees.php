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
        'reference'       => '1.a',
        'values'          => array(9, 14, 55.8),
        'expected-result' => 138.7325,
        'comment'         => 'Right ascension, 9h14m55s8',
    ),
    array(
        'values'          => array(12, 0, 0),
        'expected-result' => 180,
        'comment'         => 'Right ascension, 12h00m00s',
    ),
    array(
        'values'          => array(6, 0, 0),
        'expected-result' => 90,
        'comment'         => 'Right ascension, 6h00m00s',
    ),
    array(
        'values'          => array(6.6),
        'expected-result' => 99.0,
        'comment'         => 'Right ascension, 10h36',
    ),
);
