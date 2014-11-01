<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-is-gregorian-date.php';
require_once 'aa-julian-easter-date.php';
require_once 'aa-gregorian-easter-date.php';

/**
 * Calculates the date of the Christian Easter for a given year
 *
 * The calendar in which the year falls is automatically detected.
 *
 * @param   int        $year The year, for example: 2000, -1000, 0
 * @return  array|bool       The Easter date or false on error
 * @returns int        0     The year
 * @returns int        1     The month
 * @returns int        2     The day
 */
function aa_easter_date($year)
{
    if (aa_is_gregorian_date($year, 1, 1) === true) {
        $easter_date = aa_gregorian_easter_date($year);
    } else {
        $easter_date = aa_julian_easter_date($year);
    }

    return $easter_date;
}
