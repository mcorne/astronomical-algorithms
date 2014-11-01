<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Calculates the date of the Christian Easter for a given year in the Julian calendar
 *
 * @param   int    $year The year, for example: 2000, -1000, 0
 * @return  array        The Easter date
 * @returns int    0     The year
 * @returns int    1     The month
 * @returns int    2     The day
 */
function aa_julian_easter_date($year)
{
    $a = $year % 4;
    $b = $year % 7;
    $c = $year % 19;
    $d = (19 * $c + 15) % 30;
    $e = (2 * $a + 4 * $b - $d + 34) % 7;
    $h = $d + $e + 114;
    $month = (int)($h / 31); // f
    $day = $h % 31 + 1; // g + 1

    $easter_date = array($year, $month, $day);

    return $easter_date;
}
