<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-degrees-to-mod360.php';

/**
 * Converts decimal degrees into hours, minutes and seconds
 *
 * @param   float $degrees The decimal degrees
 * @return  array          The degrees expressed in hours, minutes and seconds
 * @returns int   0        The hours
 * @returns int   1        The minutes
 * @returns float 2        The seconds
 */
function aa_degrees_to_hms($degrees)
{
    $degrees = aa_degrees_to_mod360($degrees);

    $time = $degrees * 24 / 360;
    $hours = (int)$time;
    $remainder = ($time - $hours) * 60;
    $minutes = (int)$remainder;
    $seconds = ($remainder - $minutes) * 60;

    return array($hours, $minutes, $seconds);
}
