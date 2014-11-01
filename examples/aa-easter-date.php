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
        'reference'       => '8.p.68',
        'values'          => 1991,
        'expected-result' => array(1991, 3, 31),
        'comment'         => 'Gregorian Easter date',
    ),
    array(
        'reference'       => '8.p.69',
        'values'          => 179,
        'expected-result' => array(179, 4, 12),
        'comment'         => 'Julian Easter date',
    ),
);
