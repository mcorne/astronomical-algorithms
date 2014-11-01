<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-earth-ellipsoid.php';
require_once 'aa-set-error.php';

/**
 * Sets the Earth ellipsoid
 *
 * @param string       $earth_ellipsoid The new Earth ellipsoid, default = WGS-1984
 * @return string|bool                  False if the ellipsoid is invalid, the previous Earth ellipsoid otherwise
 */
function aa_set_earth_ellipsoid($earth_ellipsoid = null)
{
    global $_aa_earth_ellipsoid;
    global $_aa_earth_ellipsoids;

    $previous_earth_ellipsoid = $_aa_earth_ellipsoid;

    if (is_null($earth_ellipsoid)) {
        $earth_ellipsoid = EARTH_ELLIPSOID;

    } else if (! isset($_aa_earth_ellipsoids[$earth_ellipsoid])) {
        aa_set_error('Invalid ellipsoid.');
        return false;
    }

    $_aa_earth_ellipsoid  = $earth_ellipsoid;

    return $previous_earth_ellipsoid;
}
