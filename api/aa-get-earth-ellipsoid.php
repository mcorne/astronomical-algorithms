<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-earth-ellipsoid.php';

/**
 * Returns the Earth ellipsoid
 *
 * @return string The Earth ellipsoid
 */
function aa_get_earth_ellipsoid()
{
    global $_aa_earth_ellipsoid;

    return $_aa_earth_ellipsoid;
}
