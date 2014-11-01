<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-gregorian-date-to-julian-day.php';
require_once 'aa-is-gregorian-date.php';
require_once 'aa-julian-date-to-julian-day.php';

/**
 * Calculates the Julian day of a date
 *
 * The calendar in which the date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.
 *
 * @param  int        $year  The year, for example: 2000, -1000, 0
 * @param  int        $month The month, from 1 to 12
 * @param  float      $day   The day, from 1 to 31, or with decimals
 * @return float|bool        The Julian day or false on error
 */
function aa_date_to_julian_day($year, $month, $day)
{
    if (aa_is_gregorian_date($year, $month, $day)) {
        $julian_day = aa_gregorian_date_to_julian_day($year, $month, $day);
    } else {
        $julian_day = aa_julian_date_to_julian_day($year, $month, $day);
    }

    return $julian_day;
}
