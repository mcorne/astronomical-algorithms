<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Finds if the year is a Gregorian leap year
 *
 * A leap year in the Gregorian calendar is divisible by 4, and centurial years are divisible by 400.
 *
 * @param  int     $year The year, for example: 2000, -1000, 0
 * @return boolean       True if the year is a leap year, false otherwise
 */
function aa_is_gregorian_leap_year($year)
{
    if ($year % 4 != 0) {
        $is_leap_year = false;

    } else if ($year % 100 != 0) {
        $is_leap_year = true;

    } else if ($year % 400 == 0) {
        $is_leap_year = true;

    } else {
        $is_leap_year = false;
    }

    return $is_leap_year;
}
