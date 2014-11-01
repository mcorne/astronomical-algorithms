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
        'values'          => 720,
        'expected-result' => 720,
        'comment'         => 'Decimal degrees default.',
    ),
    array(
        'values'          => array(-720, 'NONE'),
        'expected-result' => -720,
        'comment'         => 'Decimal degrees default, no formating.',
    ),
    array(
        'values'          => array(450, 'DMS', true),
        'expected-result' => array(90, 0, 0, true),
        'comment'         => 'Degrees to dms, modulo 360.',
    ),
    array(
        'values'          => array(90, 'HMS', true),
        'expected-result' => array(6, 0, 0),
        'comment'         => 'Degrees to hms, modulo 360.',
    ),
    array(
        'values'          => array(-730, 'MOD360', false),
        'expected-result' => 350,
        'comment'         => 'Degrees to modulo 360.',
    ),
    array(
        'values'          => array(-720, 'RADIANS', false),
        'expected-result' => deg2rad(-720),
        'comment'         => 'Degrees to radians.',
    ),
    array(
        'values'          => array(0, 'xyz'),
        'expected-result' => false,
        'comment'         => 'Invalid format.',
    ),
);
