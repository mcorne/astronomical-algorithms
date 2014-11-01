<?php
/**
 * * Astronomical Algorithms UI Defaults
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-date-to-julian-day.php';

$year  = date('Y');
$month = date('n');
$day   = date('j');

return array(
    'day'         => $day,
    'degrees'     => 90,
    'height'      => 1706,
    'hours'       => 6,
    'is_positive' => true,
    'julian_day'  => aa_date_to_julian_day($year, $month, $day),
    'latitude'    => 33.356111,
    'minutes'     => 0,
    'month'       => $month,
    'seconds'     => 0,
    'year'        => $year,
);
