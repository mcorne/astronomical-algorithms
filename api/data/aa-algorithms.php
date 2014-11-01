<?php
/**
 * Astronomical Algorithms API
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * List of the algorithms
 */
$GLOBALS['_aa_algorithms'] = array(
    'aa_add_days_to_date'                  => 'Adds days to a date',
    'aa_curvature_radius'                  => 'Radius of curvature',
    'aa_date_difference'                   => 'Date difference',
    'aa_date_to_day_of_year'               => 'Day of the year',
    'aa_date_to_julian_day'                => 'Julian day of a date',
    'aa_date_to_julian_day0'               => 'Julian day 0 of a year',
    'aa_day_of_week'                       => 'Day of the week',
    'aa_day_of_year_to_date'               => 'Date for a given day in a given year',
    'aa_degrees_to_dms'                    => 'Converts degrees into degrees, minutes and seconds',
    'aa_degrees_to_format'                 => 'Converts degrees into a given format',
    'aa_degrees_to_hms'                    => 'Converts degrees into hours, minutes and seconds',
    'aa_degrees_to_mod360'                 => 'Converts degrees into modulo 360.',
    'aa_distance_between_two_points'       => 'Distance between two points',
    'aa_dms_to_degrees'                    => 'Converts degrees, minutes and seconds into degrees',
    'aa_easter_date'                       => 'Easter date',
    'aa_get_algorithms'                    => 'List of the algorithms',
    'aa_get_calendar_change_date'          => 'Date of the change of calendar',
    'aa_get_earth_ellipsoid'               => 'Earth ellipsoid',
    'aa_get_last_error'                    => 'Last error',
    'aa_greenwich_mean_sidereal_time'      => 'Mean sidereal time at Greenwich',
    'aa_gregorian_date_to_julian_day'      => 'Julian day of a date in the Gregorian calendar',
    'aa_gregorian_easter_date'             => 'Gregorian Easter date',
    'aa_hms_to_degrees'                    => 'Converts hours, minutes and seconds into degrees',
    'aa_is_gregorian_date'                 => 'Finds if a date is in the Gregorian calendar',
    'aa_is_gregorian_leap_year'            => 'Finds if the year is a Gregorian leap year',
    'aa_is_julian_leap_year'               => 'Finds if the year is a Julian leap year',
    'aa_is_leap_year'                      => 'Finds if the year is a leap year',
    'aa_julian_date_to_julian_day'         => 'Julian day of a date in the Julian calendar',
    'aa_julian_day_to_date'                => 'Date from a Julian day',
    'aa_julian_easter_date'                => 'Julian Easter date',
    'aa_modified_julian_day'               => 'Modified Julian day',
    'aa_nutation_arguments'                => 'Nutation arguments (internal use)',
    'aa_nutation_in_longitude'             => 'Nutation in longitude',
    'aa_nutation_in_obliquity'             => 'Nutation in obliquity',
    'aa_parallel_radius'                   => 'Radius of a parallel',
    'aa_rho_cos_phi_prime'                 => "ρ cos Φ' (rho cos phi prime)",
    'aa_rho_sin_phi_prime'                 => "ρ sin Φ' (rho sin phi prime)",
    'aa_seconds_to_format'                 => 'Converts seconds of arc into a given format',
    'aa_set_calendar_change_date'          => 'Sets the date of the change of calendar',
    'aa_set_earth_ellipsoid'               => 'Sets the Earth ellipsoid',
    'aa_set_error'                         => 'Sets an error',
);

/*
 * List of the algorithm categories
 */
$GLOBALS['_aa_algorithm_categories'] = array(
    'date'    => 'Dates',
    'degrees' => 'Degrees',
    'earth'   => 'Earth',
    'other'   => 'Other',
);

/*
 * Groups of the algorithms by category
 */
$GLOBALS['_aa_algorithms_by_category'] = array(
    'date' => array(
        'aa_add_days_to_date',
        'aa_date_difference',
        'aa_date_to_day_of_year',
        'aa_date_to_julian_day',
        'aa_date_to_julian_day0',
        'aa_day_of_week',
        'aa_day_of_year_to_date',
        'aa_easter_date',
        'aa_get_calendar_change_date',
        'aa_gregorian_date_to_julian_day',
        'aa_gregorian_easter_date',
        'aa_greenwich_mean_sidereal_time',
        'aa_is_gregorian_date',
        'aa_is_gregorian_leap_year',
        'aa_is_julian_leap_year',
        'aa_is_leap_year',
        'aa_julian_date_to_julian_day',
        'aa_julian_day_to_date',
        'aa_julian_easter_date',
        'aa_modified_julian_day',
        'aa_set_calendar_change_date',
    ),

    'degrees' => array(
        'aa_degrees_to_dms',
        'aa_degrees_to_format',
        'aa_degrees_to_hms',
        'aa_degrees_to_mod360',
        'aa_dms_to_degrees',
        'aa_hms_to_degrees',
        'aa_seconds_to_format',
    ),

    'earth' => array(
         'aa_curvature_radius',
         'aa_distance_between_two_points',
         'aa_get_earth_ellipsoid',
         'aa_nutation_in_longitude',
         'aa_nutation_in_obliquity',
         'aa_parallel_radius',
         'aa_rho_cos_phi_prime',
         'aa_rho_sin_phi_prime',
         'aa_set_earth_ellipsoid',
     ),

    'other' => array(
         'aa_nutation_arguments',
         'aa_get_algorithms',
         'aa_get_last_error',
         'aa_set_error',
    ),
);