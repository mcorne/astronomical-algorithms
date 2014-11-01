<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * The default ellipsoid model
 *
 * WGS 84 is the reference coordinate system used by the Global Positioning System
 * see http://en.wikipedia.org/wiki/WGS_84
 */
define('EARTH_ELLIPSOID' , 'WGS-1984');

/*
 * None exhaustive list of Earth ellipsoid models
 *
 * equatorial radius (a), polar radius (b) and inverse flatening (1/f)
 * see http://en.wikipedia.org/wiki/Figure_of_the_Earth
 */
$GLOBALS['_aa_earth_ellipsoids']   = array(
    'IAU-1976'  => array(6378140.0, 6356755.0   , 298.257),
    'WGS-1980'  => array(6378137.0, 6356752.3141, 298.257222101),
    'WGS-1984'  => array(6378137.0, 6356752.3142, 298.257223563),
    'IERS-1989' => array(6378136.0, 6356751.302 , 298.257),
    'IERS-2003' => array(6378136.6, 6356751.9   , 298.25642),
);

$GLOBALS['_aa_earth_ellipsoid'] = EARTH_ELLIPSOID;
