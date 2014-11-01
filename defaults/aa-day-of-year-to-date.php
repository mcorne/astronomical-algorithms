<?php
/**
 * * Astronomical Algorithms UI Defaults
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

require_once ROOT . '/api/aa-date-to-day-of-year.php';

return array(
    'day_of_year'  => aa_date_to_day_of_year(date('Y'), date('n'), date('j')),
);
