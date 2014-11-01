<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-nutation-periodic-terms.php';
require_once 'aa-degrees-to-mod360.php';

/**
 * Calculates the nutation arguments
 *
 * This function is used internally to calculate the nutation.
 *
 * @param   int   $time      The time measured in Julian centuries from the Epoch J2000.0 (JDE 2451 545.0)
 * @param   bool  $use_cache Caches the arguments of the nutation during the calculation, default = true
 * @return  float            The nutation arguments
*/

function aa_nutation_arguments($time, $use_cache = true)
{
    global $_aa_nutation_periodic_terms;
    static $cache = array();

    if ($use_cache === false or ! isset($cache[$time])) {
        $T2 = $time * $time;
        $T3 = $T2 * $time;

        $D      = aa_degrees_to_mod360(297.85036 + 445267.111480 * $time - 0.0019142 * $T2 + $T3 / 189474);
        $M      = aa_degrees_to_mod360(357.52772 + 35999.050340  * $time - 0.0001603 * $T2 - $T3 / 300000);
        $Mprime = aa_degrees_to_mod360(134.96298 + 477198.867398 * $time + 0.0086972 * $T2 + $T3 / 56250);
        $F      = aa_degrees_to_mod360(93.27191  + 483202.017538 * $time - 0.0036825 * $T2 + $T3 / 327270);
        $omega  = aa_degrees_to_mod360(125.04452 - 1934.136261   * $time + 0.0020708 * $T2 + $T3 / 450000);

        foreach($_aa_nutation_periodic_terms as $terms) {
            list($coef_D, $coef_M, $coef_Mprime, $coef_F, $coef_omega, $coef0_sin, $coef1_sin) = $terms;
            $nutation_arguments[] = deg2rad($coef_D * $D + $coef_M * $M + $coef_Mprime * $Mprime + $coef_F * $F + $coef_omega * $omega);
        }

        if ($use_cache === false) {
            return $nutation_arguments;
        }

        $cache[$time] = $nutation_arguments;
    }

    return $cache[$time];
}
