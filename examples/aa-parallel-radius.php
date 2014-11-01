<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-set-earth-ellipsoid.php';

return array(
    array(
        'reference'       => '11.b',
        'values'          => 42.0,
        'expected-result' => 4747001.0,
        'comment'         => 'Latitude of Chicago, degrees',
        'precision'       => 0,
        'pre-test'        => array(array('aa_set_earth_ellipsoid', 'IAU-1976')),
        'post-test'       => 'aa_set_earth_ellipsoid',
    ),
    array(
        'values'          => array(deg2rad(42), true),
        'expected-result' => 4747001.0,
        'comment'         => 'Latitude of Chicago, radians',
        'precision'       => 0,
        'pre-test'        => array(array('aa_set_earth_ellipsoid', 'IAU-1976')),
        'post-test'       => 'aa_set_earth_ellipsoid',
    )
);
