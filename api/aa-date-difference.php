<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-date-to-julian-day.php';

/**
 * Calculates the number of days between two dates
 *
 * The calendar in which each date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.

 * @param  int        $year_from  The year from, for example: 2000, -1000, 0
 * @param  int        $month_from The month from , from 1 to 12
 * @param  float      $day_from   The day from, from 1 to 31, or also: 1.5, 2.75, 30.25
 * @param  int        $year_to    The year to, for example: 2000, -1000, 0
 * @param  int        $month_to   The month to , from 1 to 12
 * @param  float      $day_to     The day to, from 1 to 31, or also: 1.5, 2.75, 30.25
 * @return float|bool             The number of days or false on error
 */
function aa_date_difference($year_from, $month_from, $day_from, $year_to, $month_to, $day_to)
{
    $julian_day_from = aa_date_to_julian_day($year_from, $month_from, $day_from);

    if ($julian_day_from === false) {
        return false;
    }

    $julian_day_to = aa_date_to_julian_day($year_to, $month_to, $day_to);

    if ($julian_day_to === false) {
        return false;
    }

    $days = $julian_day_to - $julian_day_from;

    return $days;
}
