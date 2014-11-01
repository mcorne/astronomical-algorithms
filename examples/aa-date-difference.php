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
        'reference'       => '7.d',
        'values'          => array(1910, 4, 20, 1986, 2, 9),
        'expected-result' => 27689.0,
        'comment'         => 'Positive difference of the dates',
    ),
    array(
        'values'          => array(1986, 2, 9, 1910, 4, 20),
        'expected-result' => -27689.0,
        'comment'         => 'Negative difference of the dates',
    ),
    array(
        'values'          => array(-5000, 1, 1, 1986, 2, 9),
        'expected-result' => false,
        'comment'         => 'Invalid beginning date with a negative Julian day',
    ),
    array(
        'values'          => array(1910, 4, 20, -5000, 1, 1),
        'expected-result' => false,
        'comment'         => 'Invalid beginning date with a negative Julian day',
    ),
);
