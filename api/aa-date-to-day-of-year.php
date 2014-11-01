<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-common.php';
require_once 'aa-is-leap-year.php';

/**
 * Calculates the day of the year for a given date
 *
 * @param   int    $year  The year, for example: 2000, -1000, 0
 * @param   int    $month The month, from 1 to 12
 * @param   float  $day   The day, from 1 to 31, or with decimals
 * @return  int           The day of the year, for example: 1, 2, 365, 366
 */
function aa_date_to_day_of_year($year, $month, $day)
{
    if (aa_is_leap_year($year)) {
        $K =  1;
    } else {
        $K = 2;
    }

    $day_of_year = aa_int((275 * $month) / 9) - $K * aa_int(($month + 9) / 12) + $day - 30;

    return $day_of_year;
}
