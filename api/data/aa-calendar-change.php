<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * Date of the change from the Julian calendar to the Gregorian calendar according to the Gregorian reform
 *
 * The day following 1582-10-4 in the Julian calendar was 1582-10-15 in the Gregorian calendar.
 */
define('CALENDAR_CHANGE_YEAR' , 1582);
define('CALENDAR_CHANGE_MONTH', 10);
define('CALENDAR_CHANGE_DAY'  , 15);

/*
 * Date of the change from the Julian calendar to the Gregorian calendar
 *
 * The default date is the date set by the Gregorian reform.
 */
$GLOBALS['_aa_calendar_change_year']  = CALENDAR_CHANGE_YEAR;
$GLOBALS['_aa_calendar_change_month'] = CALENDAR_CHANGE_MONTH;
$GLOBALS['_aa_calendar_change_day']   = CALENDAR_CHANGE_DAY;
