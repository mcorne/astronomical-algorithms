<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-get-algorithms.php';
require_once ROOT . '/api/aa-get-last-error.php';

/*
 * Functions used to process the algorithms (the MVC algorithm model)
 */

/**
 * Combines the algorithms and their descriptions
 *
 * @param  array $algorithms
 * @param  array $categories
 * @return array
 */
function combine_algorithms_and_descriptions($algorithms, $categories)
{
    $algorithms_by_category = aa_get_algorithms('both');
    $combined = array();

    foreach(array_keys($categories) as $category) {
        foreach($algorithms_by_category[$category] as $algorithm) {
            $combined[$category][$algorithm] = $algorithms[$algorithm];
        }
    }

    return $combined;
}

/**
 * Returns the list of algorithms
 *
 * @param  bool  $sort_by_description
 * @return array
 */
function get_algorithms($sort_by_description)
{
    $algorithms = aa_get_algorithms('algorithms');

    return sort_algorithms($algorithms, $sort_by_description);
}

/**
 * Returns the list of algorithm categories
 *
 * @return array
 */
function get_algorithm_categories()
{
    $categories = aa_get_algorithms('categories');
    asort($categories);

    // forces the "other" category to the end
    $other_category = $categories['other'];
    unset($categories['other']);
    $categories['other'] = $other_category;

    return $categories;
}

/**
 * Returns the list of algorithms by category
 *
 * @param  array $algorithms
 * @param  array $categories
 * @param  bool  $sort_by_description
 * @return array
 */
function get_algorithms_by_category($algorithms, $categories, $sort_by_description)
{
    $algorithms_by_category = combine_algorithms_and_descriptions($algorithms, $categories);

    return sort_algorithms_within_categories($algorithms_by_category, $sort_by_description);
}

/**
 * Returns the algorithm examples, source code and docblock
 *
 * @param  string $algorithm
 * @return array
 */
function get_algorithm_details($algorithm)
{
    $filename = str_replace('_', '-', $algorithm) . '.php';
    $examples = get_examples($filename);
    $source_code = get_source_code($filename);
    $docblock = get_docblock($algorithm, $source_code);

    return array($filename, $examples, $source_code, $docblock);
}

/**
 * Returns the default values to run the algorithm with
 *
 * @param  array  $params
 * @param  string $filename
 * @return array
 */
function get_defaults($params, $filename)
{
    $filename = ROOT . "/defaults/$filename";
    $defaults = file_exists($filename)? require $filename : array();
    $defaults += require ROOT . "/defaults/defaults.php";

    $values = array();
    foreach($params as $param) {
        if (isset($defaults[$param])) {
            $values[$param] = $defaults[$param];
        }
    }

    return $values;
}

/**
 * Returns the algorithm docblock
 *
 * @param  string      $algorithm
 * @param  string      $source_code
 * @return string|null
 */
function get_docblock($algorithm, $source_code)
{
    if (preg_match("~(?<!<\?php\n)/\*\*\s+(.+)?\s+\*/\s+function $algorithm\(~s", $source_code, $match)) {
        $docblock = preg_replace('~^ *\* *~m', '', $match[1]);
    } else {
        $docblock = null;
    }

    return $docblock;
}

/**
 * Returns the algorithms examples
 *
 * @param  string $filename
 * @return array
 */
function get_examples($filename)
{
    $filename = ROOT . "/examples/$filename";

    return file_exists($filename)? require $filename : array();
}

/**
 * Returns the algorithm parameters
 *
 * @param  string $algorithm
 * @param  string $source_code
 * @return array
 */
function get_params($algorithm, $source_code)
{
    if (preg_match("~function $algorithm\(([^)]*)\)~", $source_code, $match) and
        preg_match_all('~\$(\w+)~', $match[1], $matches)) {
        return $matches[1];
    }

    return array();
}

/**
 * Returns the source code of the algorithm
 *
 * @param  string $filename
 * @return string
 */
function get_source_code($filename)
{
    $filename = ROOT . "/api/$filename";

    return file_exists($filename)? file_get_contents($filename) : null;
}

/**
 * Runs the algorithm
 *
 * @param  string $algorithm
 * @param  array  $values
 * @param  string $filename
 * @return array
 */
function run_algorithm($algorithm, $values, $filename)
{
    require_once ROOT . "/api/$filename";
    $properties = restore_properties();
    $result = call_user_func_array($algorithm, $values);
    save_properties($properties);
    list($error_message, $backtrace) = aa_get_last_error();

    return array($result, $error_message, $backtrace);
}

/**
 * Sorts the algorithms
 *
 * @param  bool  $sort_by_description
 * @return array
 */
function sort_algorithms($algorithms, $sort_by_description)
{
    if ($sort_by_description) {
        asort($algorithms);
    } else {
        ksort($algorithms);
    }

    return $algorithms;
}

/**
 * Sorts the algorithms in each category
 *
 * @param  array $algorithms_by_category
 * @param  bool  $sort_by_description
 * @return array
 */
function sort_algorithms_within_categories($algorithms_by_category, $sort_by_description)
{
    foreach($algorithms_by_category as &$algorithms) {
        $algorithms = sort_algorithms($algorithms, $sort_by_description);
    }

    return $algorithms_by_category;
}
