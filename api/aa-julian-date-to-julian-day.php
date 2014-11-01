<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-common.php';
require_once 'aa-set-error.php';

/**
 * Calculates the Julian day of a date in the Julian calendar
 *
 * This algorithm is invalid for negative Julian days.
 *
 * @param  int      $year  The year, for example: 2000, -1000, 0
 * @param  int      $month The month, from 1 to 12
 * @param  float    $day   The day, from 1 to 31, or with decimals
 * @return int|bool        The Julian day, or false on error
 */
function aa_julian_date_to_julian_day($year, $month, $day)
{
    if ($month <= 2) {
        $year--;
        $month += 12;
    }

    $julian_day = aa_int(365.25 * ($year + 4716)) + aa_int(30.6001 * ($month + 1)) + $day - 1524.5;

    if ($julian_day < 0) {
        aa_set_error('This algorithm is invalid for negative Julian days.');
        return false;
    }

    return $julian_day;
}
