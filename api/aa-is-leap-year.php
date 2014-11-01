<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-is-gregorian-date.php';
require_once 'aa-is-gregorian-leap-year.php';
require_once 'aa-is-julian-leap-year.php';

/**
 * Finds if the year is a leap year
 *
 * The calendar in which the year falls is automatically detected.
 *
 * @param  int     $year The year, for example: 2000, -1000, 0
 * @return boolean       True if the year is a leap year, false otherwise
 */
function aa_is_leap_year($year)
{
    if (aa_is_gregorian_date($year, 1, 1) === true) {
        $is_leap_year = aa_is_gregorian_leap_year($year);
    } else {
        $is_leap_year = aa_is_julian_leap_year($year);
    }

    return $is_leap_year;
}
