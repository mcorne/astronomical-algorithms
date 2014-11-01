<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Finds if the year is a Julian leap year
 *
 * A leap year in the Julian calendar is divisible by 4.
 *
 * @param  int     $year The year, for example: 2000, -1000, 0
 * @return boolean       True if the year is a leap year, false otherwise
 */
function aa_is_julian_leap_year($year)
{
    if ($year % 4 == 0) {
        $is_leap_year = true;

    } else {
        $is_leap_year = false;
    }

    return $is_leap_year;
}
