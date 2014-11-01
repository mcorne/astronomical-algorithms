<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Calculates the modified Julian day
 *
 * @param  float $julian_day The Julian day
 * @return float             The modified Julian day
 */
function aa_modified_julian_day($julian_day)
{
    $modified_julian_day = $julian_day - 2400000.5;

    return $modified_julian_day;
}
