<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/ui/algorithms.php';
require_once ROOT . '/ui/library.php';
require_once ROOT . '/ui/test.php';

/*
 * Controller (the MVC unique controller)
 */

/**
 * Finish the action
 */
function finish_action()
{
    global $_action, $_image, $_display_image, $_site_url, $_base_url;
    global $_display_algorithm_categories, $_algorithm_categories;
    global $_algorithms_by_category, $_algorithms, $_display_algorithm_descriptions;

    if (! isset($_action)) {
        // there is no action, defaults the action to the home page
        $_action = 'home';
    }

    if (! isset($_image)) {
        // there is no image assigned to the action, defaults the image name to the action
        $_image = $_action . '.jpg';
    }

    if (! $_display_image or ! file_exists(ROOT . "/img/$_image")) {
        // there exists no image for this action yet
        $_image = null;
    }

    $_site_url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
    $_base_url = dirname($_site_url);

    if ($_display_algorithm_categories) {
        // groups the algorithms by category
        $_algorithm_categories = get_algorithm_categories();
        $_algorithms_by_category = get_algorithms_by_category($_algorithms, $_algorithm_categories, $_display_algorithm_descriptions);
    }
}

/**
 * Prepare the action
 */
function prepare_action()
{
    global $_posted_params, $_action;
    global $_display_algorithm_descriptions, $_display_algorithm_categories, $_display_image;
    global $_algorithms, $_algorithm;

    $_posted_params = get_posted_params();
    $_action = get_action($_posted_params);

    $_display_algorithm_descriptions = empty($_COOKIE['_aa_no_algorithm_description']);
    $_display_algorithm_categories = empty($_COOKIE['_aa_no_algorithm_categories']);
    $_display_image = empty($_COOKIE['_aa_no_image']);

    $_algorithms = get_algorithms($_display_algorithm_descriptions);
    $_algorithm = get_algorithm($_posted_params, $_algorithms);
}

/**
 * Processes an action
 */
function process_action()
{
    global $_action, $_algorithm, $_posted_params, $_tests;

    switch($_action) {
        case 'calculate':
            if (isset($_algorithm)) {
                process_calculate_action();
            } else {
                $_action = null;
            }
            break;

        case 'options':
            process_options_action();
            break;

        case 'test':
            if (! isset($_algorithm)) {
                $_action = null;
            } else {
                process_test_action();
            }
            break;

        case 'tests':
            process_tests_actions();
            break;
    }
}

/**
 * Runs the algorithm
 */
function process_calculate_action()
{
    global $_filename, $_examples, $_source_code, $_docblock, $_algorithm;
    global $_values, $_posted_params, $_image;
    global $_result, $_error_message, $_backtrace;

    list($_filename, $_examples, $_source_code, $_docblock) = get_algorithm_details($_algorithm);
    list($_values, $values_to_pass) = get_param_values($_algorithm, $_source_code, $_posted_params, $_examples, $_filename);
    $_image = str_replace('_', '-', $_algorithm) . '.jpg';

    if (! empty($_posted_params['run'])) {
        list($_result, $_error_message, $_backtrace) = run_algorithm($_algorithm, $values_to_pass, $_filename);
    }
}

/**
 * Sets the options
 */
function process_options_action()
{
    global $_display_algorithm_categories, $_display_algorithm_descriptions, $_display_image;
    global $_posted_params, $_message;

    if (! empty($_posted_params['save'])) {
        $_display_algorithm_categories = empty($_posted_params['_aa_no_algorithm_categories']);
        setcookie('_aa_no_algorithm_categories', ! $_display_algorithm_categories);

        $_display_algorithm_descriptions = empty($_posted_params['_aa_no_algorithm_description']);
        setcookie('_aa_no_algorithm_description', ! $_display_algorithm_descriptions);

        $_display_image = empty($_posted_params['_aa_no_image']);
        setcookie('_aa_no_image', ! $_display_image);

        $_message = 'The options were updated successfully.';
    }
}

/**
 * Runs the test of the algorithm
 */
function process_test_action()
{
    global $_filename, $_examples, $_source_code, $_docblock, $_algorithm;
    global $_posted_params, $_test;

    list($_filename, $_examples, $_source_code, $_docblock) = get_algorithm_details($_algorithm);

    if (! empty($_posted_params['run'])) {
        $_test = test_algorithm($_algorithm, $_examples);
    }
}

/**
 * Runs the tests of all the algorithms
 */
function process_tests_actions()
{
    global $_posted_params, $_tests;

    if (! empty($_posted_params['run'])) {
        $_tests = test_algorithms();
    }
}
