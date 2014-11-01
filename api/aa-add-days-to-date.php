<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-date-to-julian-day.php';
require_once 'aa-julian-day-to-date.php';
require_once 'aa-set-error.php';

/**
 * Adds a number of days to a date
 *
 * The calendar in which the date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.
 *
 * @param   int        $year        The year, for example: 2000, -1000, 0
 * @param   int        $month       The month, from 1 to 12
 * @param   float      $day         The day, from 1 to 31, or with decimals
 * @param   float      $days_to_add The number of days to add,  example: 1, 2, -1, -2, -1.25, 1.5
 * @return  array|bool              The new year or false on error
 * @returns int        0            The year
 * @returns int        1            The month
 * @returns float      2            The day
 */
function aa_add_days_to_date($year, $month, $day, $days_to_add)
{
    $julian_day = aa_date_to_julian_day($year, $month, $day);

    if ($julian_day === false) {
        return false;
    }

    $julian_day += $days_to_add;

    if ($julian_day < 0) {
        aa_set_error('This algorithm is invalid for negative Julian days.');
        return false;
    }

    $new_date = aa_julian_day_to_date($julian_day);

    return $new_date;
}
