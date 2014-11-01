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
 * Sets the date of the change from the Julian calendar to the Gregorian calendar
 *
 * The default date of the change of calendar according to the Gregorian reform is 1582-10-15.
 * The day following 1582-10-4 in the Julian calendar was 1582-10-15 in the Gregorian calendar.
 *
 * @param   int   $change_year  The new value of the year, default = 1582
 * @param   int   $change_month The new value of the month, default = 10
 * @param   int   $change_day   The new value of the day, default = 15
 * @return  array               The previous date of the change
 * @returns int   0             The previous value of the year
 * @returns int   1             The previous value of the month
 * @returns int   2             The previous value of the day
 */
function aa_set_calendar_change_date($change_year = null, $change_month = null, $change_day = null)
{
    global $_aa_calendar_change_year;
    global $_aa_calendar_change_month;
    global $_aa_calendar_change_day;

    $previous_change_date = array($_aa_calendar_change_year, $_aa_calendar_change_month, $_aa_calendar_change_day);

    $_aa_calendar_change_year  = isset($change_year)?  $change_year  : CALENDAR_CHANGE_YEAR;
    $_aa_calendar_change_month = isset($change_month)? $change_month : CALENDAR_CHANGE_MONTH;
    $_aa_calendar_change_day   = isset($change_day)?   $change_day   : CALENDAR_CHANGE_DAY;

    return $previous_change_date;
}
