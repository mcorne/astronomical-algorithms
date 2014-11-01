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
 * Calculates the day of the week for a given date
 *
 * @param  int      $year  The year, for example: 2000, -1000, 0
 * @param  int      $month The month, from 1 to 12
 * @param  float    $day   The day, from 1 to 31, or with decimals
 * @return int|bool        The day of the week, for example: 0, 1, 2, 3, 4, 5, 6, or false on error
 */
function aa_day_of_week($year, $month, $day)
{
    $julian_day = aa_date_to_julian_day($year, $month, (int)$day);

    if ($julian_day === false) {
        return false;
    }

    $julian_day += 1.5;
    $day_of_week = $julian_day % 7;

    return $day_of_week;
}
