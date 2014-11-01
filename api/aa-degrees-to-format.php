<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'aa-degrees-to-dms.php';
require_once 'aa-degrees-to-hms.php';
require_once 'aa-degrees-to-mod360.php';
require_once 'aa-set-error.php';

/**
 * Converts decimal degrees into a given format
 *
 * @param   float       $degrees The decimal degrees
 * @param   string      $format  The format: DMS, HMS, MOD360, NONE, RADIANS, default = NONE
 * @param   bool        $mod360  True to convert degrees to a value between 0 and 360 degrees before formating,
 *                               false otherwise, default = false
 * @return  float|array          The degrees expressed in the given format
 * @returns int         0        The degrees or the hours
 * @returns int         1        The minutes
 * @returns float       2        The seconds
 * @returns bool        3        True if positive, false if negative
 */
function aa_degrees_to_format($degrees, $format = null, $mod360 = false)
{
    if ($mod360) {
        $degrees = aa_degrees_to_mod360($degrees);
    }

    switch($format) {
        case 'DMS':
        case 'dms':
            $degrees = aa_degrees_to_dms($degrees);
            break;

        case 'HMS':
        case 'hms':
            $degrees = aa_degrees_to_hms($degrees);
            break;

        case 'MOD360':
        case 'mod360':
            $degrees = aa_degrees_to_mod360($degrees);
            break;

        case 'NONE':
        case null:
            // passthru, no formatting
            break;

        case 'RADIANS':
        case 'radians':
            $degrees = deg2rad($degrees);
            break;

        default:
            aa_set_error('Invalid format.');
            return false;
    }

    return $degrees;
}
