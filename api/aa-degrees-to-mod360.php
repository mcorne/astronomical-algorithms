<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Converts decimal degrees into a value between 0 and 360 degrees
 *
 * @param  float $degrees The decimal degrees
 * @return float          The decimal degrees between 0 and 360 degrees
 */
function aa_degrees_to_mod360($degrees)
{
    $decimals = $degrees - (int)$degrees;
    $degrees = $degrees % 360 + $decimals;

    if ($degrees < 0) {
        $degrees += 360;
    }

    return $degrees;
}
