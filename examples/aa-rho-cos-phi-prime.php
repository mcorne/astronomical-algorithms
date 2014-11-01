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
        'reference'       => '10.a',
        'values'          => array(33.356111, 1706),
        'expected-result' => 0.836339,
        'comment'         => 'Palomar Observatory, degrees',
        'precision'       => 6,
    ),
    array(
        'values'          => array(deg2rad(33.356111), 1706, true),
        'expected-result' => 0.836339,
        'comment'         => 'Palomar Observatory, radians',
        'precision'       => 6,
    )
);
