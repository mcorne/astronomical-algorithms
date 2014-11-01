<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-calendar-change.php';

/**
 * Finds if the date is in the Gregorian calendar or in the Julian calendar
 *
 * @param  int   $year  The year
 * @param  int   $month The month
 * @param  float $day   The day
 * @return boolean      True if the date is in the Gregorian calendar, false if the date is in the Julian calendar
 */
function aa_is_gregorian_date($year, $month, $day)
{
    global $_aa_calendar_change_year;
    global $_aa_calendar_change_month;
    global $_aa_calendar_change_day;

    if ($year > $_aa_calendar_change_year) {
        $is_gregorian_date = true;

    } else if ($year < $_aa_calendar_change_year) {
        $is_gregorian_date = false;

    } else if ($month > $_aa_calendar_change_month) {
        $is_gregorian_date = true;

    } else if ($month < $_aa_calendar_change_month) {
        $is_gregorian_date = false;

    } else if ($day >= $_aa_calendar_change_day) {
         $is_gregorian_date = true;

    } else {
        $is_gregorian_date = false;
    }

    return $is_gregorian_date;
}
