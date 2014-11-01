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
        'reference'       => '7.p.62',
        'values'          => 1236,
        'expected-result' => true,
        'comment'         => 'Leap year',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => 1429,
        'expected-result' => false,
        'comment'         => 'Common year',
    ),
);
