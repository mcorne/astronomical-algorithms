<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Returns the integer of a number
 *
 * The integer of a negative number is the greatest integer less than or equal to that number, i.e. int(-7.83) = -8.
 *
 * @param  float|int $number The number
 * @return int               The integer of the number
 */
function aa_int($number)
{
    $number = (int)$number;

    if ($number < 0) {
        $number--;
    }

    return $number;
}
