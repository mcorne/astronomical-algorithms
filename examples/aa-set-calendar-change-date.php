<?php
/**
 * Astronomical Algorithms UI Examples and Tests
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-get-calendar-change-date.php';

return array(
    array(
        'reference'       => '7.p.59',
        'values'          => array(1927, 1, 1),
        'expected-result' => aa_get_calendar_change_date(),
        'comment'         => 'New calendar change date',
    ),
);
