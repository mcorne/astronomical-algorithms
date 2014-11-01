<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Returns the error message and the calls trace from the last error
 *
 * @return  array    The error
 * @returns string 0 The error message
 * @returns array  1 The calls trace
 */
function aa_get_last_error()
{
    global $_aa_debug_backtrace;
    global $_aa_error_message;

    return array($_aa_error_message, $_aa_debug_backtrace);
}
