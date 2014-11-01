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
 * Calculates the distance between two points on the Earth's surface
 *
 * The method used is due to H. Andoyer.
 * The relative error of the result is of the order of the square of the Earth's flattening.
 *
 * @param  float $latitude_1  The geographical latitude 1 in degrees or radians
 * @param  float $longitude_1 The geographical longitude 1 in degrees or radians
 * @param  float $latitude_2  The geographical latitude 2 in degrees or radians
 * @param  float $longitude_2 The geographical longitude 2 in degrees or radians
 * @param  bool  $is_radian   True if the latitude is in radians, false if the latitude is in degrees
 * @return float              The distance in meters
 */
function aa_distance_between_two_points($latitude_1, $longitude_1, $latitude_2, $longitude_2, $is_radian = false)
{
    global $_aa_earth_ellipsoid;
    global $_aa_earth_ellipsoids;

    if ($latitude_1 == $latitude_2 and $longitude_1 == $longitude_2) {
        // the two points are the same
        return 0;
    }

    if (! $is_radian) {
        $latitude_1 = deg2rad($latitude_1); // Φ1
        $longitude_1 = deg2rad($longitude_1); // L1
        $latitude_2 = deg2rad($latitude_2); // Φ2
        $longitude_2 = deg2rad($longitude_2); // L2
    }

    list($equatorial_radius, , $inverse_flattening) = $_aa_earth_ellipsoids[$_aa_earth_ellipsoid]; // a, 1/f
    $flattening = 1 / $inverse_flattening; // f

    $F = ($latitude_1 + $latitude_2) / 2;
    $G = ($latitude_1 - $latitude_2) / 2;
    $lambda = ($longitude_1 - $longitude_2) / 2;

    $sin_G = sin($G);
    $sin2_G = $sin_G * $sin_G;
    $cos_lambda = cos($lambda);
    $cos2_lambda = $cos_lambda * $cos_lambda;
    $cos_F = cos($F);
    $cos2_F = $cos_F * $cos_F;
    $sin_lambda = sin($lambda);
    $sin2_lambda = $sin_lambda * $sin_lambda;
    $cos_G = cos($G);
    $cos2_G = $cos_G * $cos_G;
    $sin_F = sin($F);
    $sin2_F = $sin_F * $sin_F;

    $S = ($sin2_G * $cos2_lambda) + ($cos2_F * $sin2_lambda);
    $C = ($cos2_G * $cos2_lambda) + ($sin2_F * $sin2_lambda);

    $w = atan(sqrt($S / $C));

    if ($w == 0) {
        // possible case (?) where the distance between the two points is so small
        // that w is null and cannot be used to calculate R below
        $distance = 0;

    } else {
        $R = sqrt($S * $C) / $w;
        $D = 2 * $w * $equatorial_radius;
        $R3 = 3 * $R;
        $H1 = ($R3 - 1) / (2 * $C);
        $H2 = ($R3 + 1) / (2 * $S);

        $distance = $D * (1 + $flattening * $H1 * $sin2_F * $cos2_G - $flattening * $H2 * $cos2_F * $sin2_G);
    }

    return $distance;
}
