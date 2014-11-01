<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-nutation-periodic-terms.php';
require_once 'aa-nutation-arguments.php';
require_once 'aa-date-to-julian-day.php';
require_once 'aa-seconds-to-format.php';

/**
 * Calculates the nutation in obliquity
 *
 *
 * @param   int|float $year      The year, for example: 2000, -1000, 0, or a Julian day
 * @param   int|bool  $month     The month, from 1 to 12, or false if the previous parameter is a Julian day
 * @param   int|float $day       The day, from 1 to 31, or with decimals
 * @param   int       $hours     The hours, from 0 to 23
 * @param   int       $minutes   The minutes, from 0 to 59
 * @param   float     $seconds   The seconds, from 0 to 59, or with decimals
 * @param   string    $format    The format of the nutation in obliquity: DEGREES, RADIANS, SECONDS, default = SECONDS
 * @param   bool      $use_cache Caches the arguments of the nutation during the calculation, default = true
 * @return  float                The nutation in obliquity
*/

function aa_nutation_in_obliquity($year, $month, $day = null, $hours = null, $minutes = null, $seconds = null, $format = null, $use_cache = true)
{
    global $_aa_nutation_periodic_terms;


    if ($month === false) {
        // the year is actually a Julian day
        $julian_day = $year;
    } else {
        // a date is passed, calculates the Julian day
        $julian_day = aa_date_to_julian_day($year, $month, $day, $hours, $minutes, $seconds);

        if ($julian_day === false) {
            return false;
        }
    }

    $T  = ($julian_day - 2451545) / 36525;
    $nutation_arguments = aa_nutation_arguments($T, $use_cache);
    $nutation_in_obliquity = 0;

    foreach($_aa_nutation_periodic_terms as $index => $terms) {
        list(, , , , , , , $coef0_cos, $coef1_cos) = $terms;
        $nutation_in_obliquity += ($coef0_cos + $coef1_cos * $T) * cos($nutation_arguments[$index]) * 0.0001;
    }

    if ($format !== null) {
        $nutation_in_obliquity = aa_seconds_to_format($nutation_in_obliquity, $format);
    }

    return $nutation_in_obliquity;
}
