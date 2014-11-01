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
        'values'          => 1777,
        'expected-result' => false,
        'comment'         => 'Common year, not divisible by 4',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => 1236,
        'expected-result' => true,
        'comment'         => 'Leap year, not centurial',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => 1700,
        'expected-result' => false,
        'comment'         => 'Common year, centurial year not divisible by 400',
    ),
    array(
        'reference'       => '7.p.62',
        'values'          => 2000,
        'expected-result' => true,
        'comment'         => 'Leap year, centurial year divisible by 400',
    ),
);
