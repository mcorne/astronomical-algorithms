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
 * Returns the date of the change from the Julian calendar to the Gregorian calendar
 *
 * @return  array   The date of the change
 * @returns int   0 The year
 * @returns int   1 The month
 * @returns int   2 The day
 */
function aa_get_calendar_change_date()
{
    global $_aa_calendar_change_year;
    global $_aa_calendar_change_month;
    global $_aa_calendar_change_day;

    $change_date = array($_aa_calendar_change_year, $_aa_calendar_change_month, $_aa_calendar_change_day);

    return $change_date;
}
