<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Calculates the date of the Christian Easter for a given year in the Gregorian calendar
 *
 * @param   int    $year The year, for example: 2000, -1000, 0
 * @return  array        The Easter date
 * @returns int    0     The year
 * @returns int    1     The month
 * @returns int    2     The day
 */
function aa_gregorian_easter_date($year)
{
    $a = $year % 19;
    $b = (int)($year / 100);
    $c = $year % 100;
    $d = (int)($b / 4);
    $e = $b % 4;
    $f = (int)(($b + 8) / 25);
    $g = (int)(($b - $f + 1) / 3);
    $h = (19 * $a + $b - $d - $g + 15) % 30;
    $i = (int)($c / 4);
    $k = $c % 4;
    $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
    $m = (int)(($a + 11 * $h + 22 * $l) / 451);
    $o = $h + $l - 7 * $m + 114;
    $month = (int)($o / 31); // n
    $day = $o % 31 + 1; // p + 1

    $easter_date = array($year, $month, $day);

    return $easter_date;
}
