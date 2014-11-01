<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/**
 * Sets the error message and the calls trace
 *
 * @param string $error_message The error message
 */
function aa_set_error($error_message)
{
    global $_aa_error_message;
    global $_aa_debug_backtrace;

    $_aa_error_message = $error_message;
    $_aa_debug_backtrace = debug_backtrace();
    // removes the call to this function
    array_shift($_aa_debug_backtrace);
}