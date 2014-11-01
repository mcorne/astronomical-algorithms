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
 * Calculates the date for a given day in a given year
 *
 * The calendar in which the year falls is automatically detected.
 * This is needed to determine if the year is a leap year.
 *
 * @param   int        $year        The year, for example: 2000, -1000, 0
 * @param   int        $day_of_year The day of the year, for example: 1, 2, 365, 366
 * @return  array|bool              The date or false on error
 * @returns int        0            The year
 * @returns int        1            The month
 * @returns int        2            The day
 */
function aa_day_of_year_to_date($year, $day_of_year)
{
    if (aa_is_leap_year($year)) {
        $K =  1;
    } else {
        $K = 2;
    }

    if ($day_of_year < 32) {
        $month = 1;
    } else {
        $month = aa_int(($K + $day_of_year) * 9 / 275 + 0.98);
    }

    $day = $day_of_year - aa_int((275 * $month) / 9) + $K * aa_int(($month + 9) / 12) + 30;

    return array($year, $month, $day);
}
