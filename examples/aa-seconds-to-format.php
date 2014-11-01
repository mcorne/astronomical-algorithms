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
        'values'          => 1,
        'expected-result' => 1,
        'comment'         => 'Seconds default.',
    ),
    array(
        'values'          => array(1, 'SECONDS'),
        'expected-result' => 1,
        'comment'         => 'Seconds to seconds.',
    ),
    array(
        'values'          => array(3600, 'DEGREES'),
        'expected-result' => 1,
        'comment'         => 'Seconds to degrees.',
    ),
    array(
        'values'          => array(3600, 'RADIANS'),
        'expected-result' => deg2rad(1),
        'comment'         => 'Seconds to radians.',
    ),
);
