<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-date-to-julian-day.php';
require_once 'aa-degrees-to-format.php';

/**
 * Calculates the mean sidereal time at Greenwich
 *
 * The calendar in which the date falls is automatically detected.
 * This algorithm is invalid for negative Julian days.
 *
 * @param   int              $year    The year, for example: 2000, -1000, 0
 * @param   int              $month   The month, from 1 to 12
 * @param   int|float        $day     The day, from 1 to 31, or with decimals
 * @param   int              $hours   The hours, from 0 to 23
 * @param   int              $minutes The minutes, from 0 to 59
 * @param   float            $seconds The seconds, from 0 to 59, or with decimals
 * @param   string           $format  The format of the mean sidereal time: DMS, HMS, MOD360, NONE, RADIANS, default = HMS
 * @param   bool             $mod360  True to convert degrees to a value between 0 and 360 degrees before formating,
 *                                    false otherwise, default = true
 * @return  float|array|bool          The mean sidereal time at Greenwich
 * @returns int              0        The hours or degrees
 * @returns int              1        The minutes
 * @returns float            2        The seconds
*/

function aa_greenwich_mean_sidereal_time($year, $month, $day, $hours = null, $minutes = null, $seconds = null, $format = null, $mod360 = true)
{
    is_null($format) and $format = 'HMS';

    $julian_day = aa_date_to_julian_day($year, $month, (int)$day);

    if ($julian_day === false) {
        return false;
    }

    $T = ($julian_day - 2451545) / 36525;
    $T2 = $T * $T;
    $T3 = $T2 * $T;
    $mean_sidereal_time = 100.46061837 + 36000.770053608 * $T + 0.000387933 * $T2 - $T3 / 38710000;

    $time = (($day - (int)$day) * 24 + $hours) * 3600 + $minutes * 60 + $seconds;
    $mean_sidereal_time += 1.00273790935 * $time / 240; // 3600 / 24 * 360 = 240

    $mean_sidereal_time = aa_degrees_to_format($mean_sidereal_time, $format, $mod360);

    return $mean_sidereal_time;
}
