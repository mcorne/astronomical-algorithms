<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once 'data/aa-algorithms.php';
require_once 'aa-set-error.php';

/**
 * Returns the list of algorithms
 *
 * @param  string  $type The type of list: "algorithms", "categories", "both"
 * @return array         The list of the algorithms
 */
function aa_get_algorithms($type = null)
{
    global $_aa_algorithms;
    global $_aa_algorithm_categories;
    global $_aa_algorithms_by_category;

    is_null($type) and $type = 'algorithms';

    switch($type) {
        case 'algorithms':
            return $_aa_algorithms;

        case 'categories':
            return $_aa_algorithm_categories;

        case 'both':
            return $_aa_algorithms_by_category;

        default:
            aa_set_error('Type of list invalid.');
            return false;
    }
}
