<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-degrees-to-mod360.php';

/**
 * Converts decimal degrees into degrees, minutes and seconds
 *
 * @param   float $degrees The decimal degrees
 * @return  array          The degrees expressed in degrees, minutes and seconds
 * @returns int   0        The degrees
 * @returns int   1        The minutes
 * @returns float 2        The seconds
 * @returns bool  3        True if positive, false if negative
 */
function aa_degrees_to_dms($degrees)
{
    $int_degrees = (int)$degrees;
    $remainder = ($degrees - $int_degrees) * 60;
    $minutes = (int)$remainder;
    $seconds = ($remainder - $minutes) * 60;

    if ($int_degrees >= 0) {
        $is_positive = true;
    } else {
        $is_positive = false;
        $int_degrees = -$int_degrees;
        $minutes = -$minutes;
        $seconds = -$seconds;
    }

    return array($int_degrees, $minutes, $seconds, $is_positive);
}
