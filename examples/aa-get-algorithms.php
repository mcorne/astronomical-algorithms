<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

function get_expected_algorithms()
{
    $filenames = glob(ROOT . '/api/*.php');
    $expected_alogorithms = array();

    foreach($filenames as $filename) {
        $basename = basename($filename, '.php');

        if ($basename != 'aa-common') {
            $expected_alogorithms[] = str_replace('-', '_', $basename);
        }
    }

    sort($expected_alogorithms);

    return $expected_alogorithms;
}

function merge_algorithms_from_categories($algorithms_by_categories)
{
    $merged = array();

    foreach($algorithms_by_categories as $algorithms) {
        $merged = array_merge($merged, $algorithms);
    }

    sort($merged);

    return $merged;
}

return array(
    array(
        'values'          => array(),
        'expected-result' => get_expected_algorithms(),
        'comment'         => 'List of algorithms by default',
        'post-processing' => 'array_keys',
    ),
    array(
        'values'          => 'algorithms',
        'expected-result' => get_expected_algorithms(),
        'comment'         => 'List of algorithms',
        'post-processing' => 'array_keys',
    ),
    array(
        'values'          => 'both',
        'expected-result' => get_expected_algorithms(),
        'comment'         => 'List of algorithms by category',
        'post-processing' => 'merge_algorithms_from_categories',
    ),
    array(
        'values'          => 'categories',
        // note that $GLOBALS['_aa_algorithms_by_category'] is set from previous tests
        'expected-result' => array_keys($GLOBALS['_aa_algorithms_by_category']),
        'comment'         => 'List of categories',
        'post-processing' => 'array_keys',
    ),
    array(
        'values'          => 'xyz',
        'expected-result' => false,
        'comment'         => 'Invalid type',
    ),
);
