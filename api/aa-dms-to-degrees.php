<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Converts degrees, minutes and seconds into decimal degrees
 *
 * @param  int|float   $degrees     The degrees, for example: 10, 10.5 (10°30')
 * @param  int|float   $minutes     The minutes, for example: 20, 20.5 (20'30"), default = 0
 * @param  float       $seconds     The seconds, for example: 30, 30.56 (30.56"), default = 0
 * @param  float       $is_positive True if positive, false if negative
 * @return float                    The decimal degrees
 */
function aa_dms_to_degrees($degrees, $minutes = 0, $seconds = 0, $is_positive = true)
{
    $degrees = ($degrees + $minutes / 60 + $seconds / 3600); // 360/24 = 15

    if (! $is_positive) {
        $degrees = -$degrees;
    }

    return $degrees;
}
