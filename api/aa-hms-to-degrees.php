<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Converts hours, minutes and seconds into decimal degrees
 *
 * @param  int|float   $hours    The hours, for example: 10, 10.5 (10h30)
 * @param  int|float   $minutes  The minutes, for example: 20, 20.5 (20m30s), default = 0
 * @param  float       $seconds  The seconds, for example: 30, 30.56 (30s56), default = 0
 * @return float                 The decimal degrees
 */
function aa_hms_to_degrees($hours, $minutes = 0, $seconds = 0)
{
    $degrees = ($hours + $minutes / 60 + $seconds / 3600) * 15; // 360/24 = 15

    return $degrees;
}
