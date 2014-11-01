<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-gregorian-date-to-julian-day.php';

return array(
    array(
        'reference'       => '7.p.63',
        'values'          => aa_gregorian_date_to_julian_day(1858, 11, 17),
        'expected-result' => 0.0,
        'comment'         => 'Modified Julian day corresponding to 1585-11-17.',
    ),
);
