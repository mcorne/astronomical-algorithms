<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-earth-ellipsoid.php';

/**
 * Calculates the radius of curvature of the meridian at a given latitude
 *
 * @param  float $latitude  The geographical latitude in degrees or radians
 * @param  bool  $is_radian True if the latitude is in radians, false if the latitude is in degrees
 * @return float            The radius of the parallel in meters
 */
function aa_curvature_radius($latitude, $is_radian = false)
{
    global $_aa_earth_ellipsoid;
    global $_aa_earth_ellipsoids;

    $is_radian or $latitude = deg2rad($latitude); // Φ

    list($equatorial_radius, , $inverse_flattening) = $_aa_earth_ellipsoids[$_aa_earth_ellipsoid];// a, 1/f
    $flattening = 1 / $inverse_flattening; // f
    $e = sqrt(2 * $flattening - $flattening * $flattening);
    $g = $e * sin($latitude);
    $curvature_radius = $equatorial_radius * (1 - $e * $e) / pow(1 - $g * $g, 3 / 2);

    return $curvature_radius;
}
