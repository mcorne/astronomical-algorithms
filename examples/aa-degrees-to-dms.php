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
        'values'          => 10.5,
        'expected-result' => array(10, 30, 0.0, true),
        'comment'         => 'Positive decimal degrees',
    ),
    array(
        'values'          => -10.5,
        'expected-result' => array(10, 30, 0.0, false),
        'comment'         => 'Negative decimal degrees',
    ),
);
