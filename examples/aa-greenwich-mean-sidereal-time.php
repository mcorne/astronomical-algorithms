<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

return array(
    array(
        'reference'       => '12.a',
        'values'          => array(1987, 4, 10, null, null, null, 'HMS'),
        'expected-result' => array(13, 10, 46.3668),
        'comment'         => 'Mean sidereal time at Greenwich at 0h',
        'precision'       => array(null, null, 4),
    ),
    array(
        'reference'       => '12.b',
        'values'          => array(1987, 4, 10, 19, 21, 00, 'HMS'),
        'expected-result' => array(8, 34, 57.0896),
        'comment'         => 'Mean sidereal time at Greenwich with time, HMS',
        'precision'       => array(null, null, 4),
    ),
    array(
        'reference'       => '12.b',
        'values'          => array(1987, 4, 10, 19, 21, 00, 'MOD360'),
        'expected-result' => 128.7378733, // 128.7378734 in the book
        'comment'         => 'Mean sidereal time at Greenwich with time, MOD360',
        'precision'       => 7,
    ),
    array(
        'reference'       => '12.b',
        'values'          => array(1987, 4, 10, 19, 21, 00, 'NONE', false),
        'expected-result' => -4191.2621267, // formula 12.4 gives -1677831.2621266 according to the book but using formula 12.3 here
        'comment'         => 'Mean sidereal time at Greenwich with time, decimal degrees',
        'precision'       => 7,
    ),
);
