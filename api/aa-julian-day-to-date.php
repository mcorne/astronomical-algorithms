<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-common.php';
require_once 'aa-get-calendar-change-date.php';
require_once 'aa-gregorian-date-to-julian-day.php';
require_once 'aa-set-error.php';

/**
 * Calculates the date from a Julian day
 *
 * The calendar in which the date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.
 *
 * @param   int        $julian_day The Julian day
 * @return  array|bool             The date or false on error
 * @returns int        0           The year
 * @returns int        1           The month
 * @returns float      2           The day
 */
function aa_julian_day_to_date($julian_day)
{
    if ($julian_day < 0) {
        aa_set_error('This algorithm is invalid for negative Julian days.');
        return false;
    }

    $julian_day += 0.5;
    $Z = aa_int($julian_day);
    $F = $julian_day - $Z;

    // fixes Meeus original algorithm (p. 63) to calculate the Julian day of the change of calendar
    // the value of 2299161 is the Julian day for 1582-10-15 in the Gregorian calendar + 0.5
    // 1582-10-15 is the default first day of the Gregorian calendar
    list($change_year, $change_month, $change_day) = aa_get_calendar_change_date();
    $change_julian_day = aa_gregorian_date_to_julian_day($change_year, $change_month, $change_day);
    $change_julian_day += 0.5;

    if ($Z < $change_julian_day) {
        $A = $Z;
    } else {
        $alpha = aa_int(($Z - 1867216.25) / 36524.25);
        $A = $Z + 1 + $alpha - aa_int($alpha / 4);
    }

    $B = $A + 1524;
    $C = aa_int(($B - 122.1) / 365.25);
    $D = aa_int(365.25 * $C);
    $E = aa_int(($B - $D) / 30.6001);

    $day = $B - $D - aa_int(30.6001 * $E) + $F;

    if ($E < 14) {
        $month = $E - 1;
    } else if ($E == 14 or $E == 15) {
        $month = $E - 13;
    } else {
        aa_set_error('The calculated value of the month is out of range.');
        return false;
    }

    if ($month > 2) {
        $year = $C - 4716;
    } else {
        $year = $C - 4715;
    }

    return array($year, $month, $day);
}
