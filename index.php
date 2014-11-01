<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

$_time = microtime(true);
$dir = dirname(__FILE__);
set_include_path($dir . '/api');
define('ROOT', $dir);

require_once ROOT . '/ui/controller.php';
prepare_action();
process_action();
finish_action();

require_once ROOT . '/ui/display.php';
require      ROOT . '/ui/views/layout.phtml';
