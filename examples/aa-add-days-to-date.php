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
        'reference'       => '7.p.64',
        'values'          => array(1991, 7, 11, 10000),
        'expected-result' => array(2018, 11, 26.0),
        'comment'         => 'Addition of days',
    ),
    array(
        'values'          => array(2000, 6, 20, -10),
        'expected-result' => array(2000, 6, 10.0),
        'comment'         => 'Substraction of days',
    ),
    array(
        'values'          => array(-5000, 1, 1, 10),
        'expected-result' => false,
        'comment'         => 'Invalid date with a negative Julian day',
    ),
    array(
        'values'          => array(-4712, 1, 1, -10),
        'expected-result' => false,
        'comment'         => 'Substraction of days producing a negative Julian day',
    ),
);
