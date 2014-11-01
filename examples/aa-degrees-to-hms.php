<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-hms-to-degrees.php';

return array(
    array(
        'reference'       => '1.a',
        'values'          => aa_hms_to_degrees(9, 14, 55.8),
        'expected-result' => array(9, 14, 55.8),
        'comment'         => 'Right ascension, 9h14m55s8',
        'precision'       => array(null, null, 6),
    ),
    array(
        'values'          => 180,
        'expected-result' => array(12, 0, 0),
        'comment'         => 'Right ascension, 180°',
    ),
    array(
        'values'          => -90,
        'expected-result' => array(18, 0, 0),
        'comment'         => 'Right ascension, -90°',
    ),
);
