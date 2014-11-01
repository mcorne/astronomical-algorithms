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
 * Calculates the Julian day corresponding to January 0.0 of a given year
 *
 * This is the same number as for December 31.0 of the preceding year.
 * The calendar in which the date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.
 *
 * @param  int        $year  The year, for example: 2000, -1000, 0
 * @param  int        $month The month, from 1 to 12
 * @param  float      $day   The day, from 1 to 31, or with decimals
 * @return float|bool        The Julian day or false on error
 */
function aa_date_to_julian_day0($year)
{
    $julian_day0 = aa_date_to_julian_day($year - 1, 12, 31);

    return $julian_day0;
}
