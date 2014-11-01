<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-set-earth-ellipsoid.php';

function dms_to_degrees($degrees, $minutes, $seconds, $sign = 1)
{
    return ($degrees + $minutes/60 + $seconds/3600) * $sign;
}

return array(
    array(
        'reference'       => '11.c',
        'values'          => array(
                                 dms_to_degrees(48, 50, 11),
                                 dms_to_degrees(2, 20, 14, -1),
                                 dms_to_degrees(38, 55, 17),
                                 dms_to_degrees(77, 03, 56),
                             ),
        'expected-result' => 6181630.0,
        'comment'         => 'Paris Observatory to US Naval Observatory Washington DC',
        'precision'       => -1,
        'pre-test'        => array(array('aa_set_earth_ellipsoid', 'IAU-1976')),
        'post-test'       => 'aa_set_earth_ellipsoid',
    ),
    array(
        'values'          => array(10, 20, 10, 20),
        'expected-result' => 0,
        'comment'         => 'Same points',
    ),
);
