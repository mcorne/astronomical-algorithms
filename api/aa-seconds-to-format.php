<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-set-error.php';

/**
 * Converts seconds of arc into a given format
 *
 * @param   float       $seconds The seconds of arc
 * @param   string      $format  The format: DEGREES, RADIANS, default = null or SECONDS (passthru)
 * @return  float|array          The degrees expressed in the given format
 */
function aa_seconds_to_format($seconds, $format = null)
{
    switch($format) {
        case 'DEGREES':
        case 'degrees':
            $degrees = $seconds / 3600;
            break;

        case 'RADIANS':
        case 'radians':
            $degrees = deg2rad($seconds / 3600);
            break;

        case 'SECONDS':
        case 'seconds':
        case null:
            // passthru
            $degrees = $seconds;
            break;

        default:
            aa_set_error('Invalid format.');
            return false;
    }

    return $degrees;
}
