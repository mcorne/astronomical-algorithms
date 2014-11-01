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
 * Calculates the quantity ρ cos Φ' (rho cos phi prime) of a latitude
 *
 * Φ is the geographical latitude.
 * Φ' is the geocentric latitude.
 *
 * @param  float $latitude  The geographical latitude in degrees or radians
 * @param  float $height    The height above sea level in meters
 * @param  bool  $is_radian True if the latitude is in radians, false if the latitude is in degrees
 * @return float            The quantity ρ cos Φ'
 */
function aa_rho_cos_phi_prime($latitude, $height, $is_radian = false)
{
    global $_aa_earth_ellipsoid;
    global $_aa_earth_ellipsoids;

    $is_radian or $latitude = deg2rad($latitude); // Φ

    list($equatorial_radius, $polar_radius) = $_aa_earth_ellipsoids[$_aa_earth_ellipsoid]; // a, b
    $radius_ratio = $polar_radius / $equatorial_radius; // b/a
    $u = atan($radius_ratio * tan($latitude));

    $rho_cos_phi_prime = cos($u) + $height / 6378140 * cos($latitude);

    return $rho_cos_phi_prime;
}
