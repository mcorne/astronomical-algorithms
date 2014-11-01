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
        'values'          => 12.3456,
        'expected-result' => 12.3456,
        'comment'         => 'Positive decimal degrees.',
    ),
    array(
        'values'          => -10.5,
        'expected-result' => 360 - 10.5,
        'comment'         => 'Negative decimal degrees.',
    ),
    array(
        'values'          => 30 + 10 * 360,
        'expected-result' => 30,
        'comment'         => 'Positive decimal degrees greater than 360.',
    ),
    array(
        'values'          => -(10 + 10 * 360),
        'expected-result' => 360 - 10,
        'comment'         => 'Negative decimal degrees lower than 360.',
    ),
);
