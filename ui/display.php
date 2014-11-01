<?php
/**
 * Astronomical Algorithms UI
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2012 Michel Corne
 * @license   http://opensource.org/licenses/mit-license.php MIT
 */

/*
 * Functions used to display information (the MVC view helpers)
 */

function display_args($args, $enclose = false)
{
    if (is_array($args)) {
        foreach($args as &$arg) {
            $arg = display_args($arg, true);
        }

        $args = implode(', ', $args);

        if ($enclose) {
            $args = '(' . $args . ')';
        }

    } else {
        if ($args === true) {
            $args = 'true';

        } else if ($args === false) {
            $args = 'false';

        } else if ($args === null) {
            $args = 'null';
        }
    }

    return $args;
}

/**
 * Displays an array in multiple lines
 *
 * @param  array  $array
 * @param  bool   $inline
 * @return string
 */
function display_array($array)
{
    $string = print_r((array)$array, true);

    return display_string($string);
}

/**
 * Displays a backtrace
 *
 * @param  array  $backtrace
 * @param  string $algorithm
 * @param  string $source_code
 * @return string
 */
function display_backtrace($backtrace, $algorithm, $source_code)
{
    $displayed = null;

    foreach($backtrace as $index => $call) {
        $args = display_args($call['args']);

        if (isset($call['file'])) {
            // there is a file name
            $filename = basename($call['file']);
        } else {
            // there is no file name, makes the file name from the name of the function
            $filename = str_replace('_', '-', $call['function']) . '.php';
        }

        if (isset($call['line'])) {
            // there is a line number
            $line = $call['line'];
            $text = 'called at';
        } else {
            // there is no line number, finds the line where the function is declared
            $line = find_function_declaration($algorithm, $source_code);
            $text = 'declared at';
        }

        $displayed[] = sprintf('#%s %s ( %s ) %s [ %s : %s ]',
            $index,
            $call['function'],
            htmlspecialchars($args, ENT_COMPAT, 'UTF-8'),
            $text,
            $filename,
            $line
        );

        if ($call['function'] == $algorithm) {
            // ignores the call to this function
            break;
        }
    }

    return implode('<br />', $displayed);
}

/**
 * Displays the algorithm description
 *
 * @param  string $docblock
 * @return string
 */
function display_description($docblock)
{
    list($intro) = explode('@', $docblock);
    @list(, $description) = explode("\n", $intro, 2);
    $description = trim($description);

    return display_string($description);
}

/**
 * Displays a parameter comment
 *
 * @param  string      $param
 * @param  string      $docblock
 * @return string|null
 */
function display_param_comment($param, $docblock)
{
    if (preg_match("~^@param +[^ ]+ +\\$$param +([^@]+)~sm", $docblock, $match)) {
        return display_string($match[1]);
    }

    return null;
}

/**
 * Displays a parameter label
 *
 * @param  string $param
 * @return string
 */
function display_param_label($param)
{
    $param = str_replace('_', ' ', $param);

    return ucfirst($param);
}

/**
 * Displays the result comment
 *
 * @param  string      $docblock
 * @return string|null
 */
function display_result_comment($docblock)
{
    if (preg_match("~^@return +[^ ]+ +([^@]+)~sm", $docblock, $match)) {
        return display_string($match[1]);
    }

    return null;
}

/**
 * Displays a result part comment
 *
 * @param  int         $index
 * @param  string      $docblock
 * @return string|null
 */
function display_result_part_comment($index, $docblock)
{
    if (preg_match("~^@returns +[^ ]+ +$index +([^@]+)~sm", $docblock, $match)) {
        return display_string($match[1]);
    }

    return null;
}

/**
 * Displays the result part type
 *
 * @param  int          $index
 * @param  string       $docblock
 * @return unknown|null
 */
function display_result_part_type($index, $docblock)
{
    if (preg_match("~^@returns +([\w|]+) +$index~m", $docblock, $match)) {
        return $match[1];
    }

    return null;
}

/**
 * Displays the docblock
 *
 * @param  string       $docblock
 * @return unknown|null
 */
function display_result_type($docblock)
{
    if (preg_match("~^@return +([\w|]+)~m", $docblock, $match)) {
        return $match[1];
    }

    return null;
}

/**
 * Displays the result as a value or an array of values
 *
 * @param  array|number $value
 * @param  string       $dockblock
 * @return string
 */
function display_result_value($value, $dockblock)
{
    if (is_array($value) and strpos($dockblock, '@returns')) {
        $displayed = display_values_inline($value);

    } else {
        $displayed = display_value_inline($value);
    }

    return $displayed;
}

/**
 * Displays a string
 *
 * @param  string $string
 * @return string
 */
function display_string($string)
{
    $string = htmlspecialchars($string, ENT_COMPAT, 'UTF-8');
    $string = str_replace('    ', '<span class="tab">....</span>', $string);

    return nl2br($string);
}

/**
 * Displays the time
 *
 * @param  float   $time
 * @return float
 */
function display_time($time)
{
    $rounded = (float)round($time, 1) or
    $rounded = (float)round($time, 2) or
    $rounded = (float)round($time, 3) or
    $rounded = (float)round($time, 4) or
    $rounded = (float)round($time, 5) or
    $rounded = (float)round($time, 6);

    return $rounded;
}

/**
 * Displays the algorithm title
 *
 * @param  string $docblock
 * @return string
 */
function display_title($docblock)
{
    list($title) = explode("\n", $docblock);

    return display_string($title);
}

/**
 * Displays a value in one line
 *
 * @param  mixed  $value
 * @param  int    $precision
 * @param  bool   $null_as_string
 * @return string
 */
function display_value_inline($value, $precision = null, $null_as_string = false)
{
    if (is_array($value)) {
        $displayed = display_array($value);

    } else if ($value === true) {
        $displayed = 'true';

    } else if ($value === false) {
        $displayed = 'false';

    } else if ($value === null) {
        $displayed = $null_as_string? 'null' : null;

    } else if (is_float($value)) {
        $displayed = $precision !== null? round($value, $precision) : $value;

    } else {
        $displayed = display_string($value);
    }

    return $displayed;
}

/**
 * Display a value in line with its type
 *
 * @param  mixed  $value
 * @return string
 */
function display_value_inline_with_type($value)
{
    if (is_array($value)) {
        foreach($value as $part) {
            $parts[] = display_value_inline_with_type($part);
        }

        $displayed = implode(',<br />', $parts);


    } else {
        $type = gettype($value);

        if ($type == 'boolean') {
            $value = $value? 'true' : 'false';
        }

        $displayed = "($type) $value";
    }

    return $displayed;
}

/**
 * Displays values in one line
 *
 * @param  array  $values
 * @param  int    $precision
 * @param  string $line_break
 * @param  bool   $enclose
 * @param  bool   $null_as_string
 * @return string
 */
function display_values_inline($values, $precision = null, $line_break = null, $enclose = false, $null_as_string = false)
{
    settype($values, 'array');

    foreach($values as &$value) {
        $value = display_value_inline($value, $precision, $null_as_string);
    }

    is_null($line_break) and $line_break = ' ';
    $string = implode(",$line_break", $values) ;

    if ($enclose) {
        $string = '( ' . $string . ' )';
    }

    return display_string($string);
}

/**
 * Finds the line number of the algorithm declaration
 *
 * @param  string      $algorithm
 * @param  string      $source_code
 * @return number|null
 */
function find_function_declaration($algorithm, $source_code)
{
    $lines = explode("\n", $source_code);

    foreach($lines as $index => $line) {
        if (strpos($line, "function $algorithm") === 0) {
            return $index + 1;
        }
    }

    return null;
}

/**
 * Returns a parameter type
 *
 * @param  string      $param
 * @param  string      $docblock
 * @return string|null
 */
function get_param_type($param, $docblock)
{
    if (preg_match("~^@param +([\w|]+) +\\$$param~m", $docblock, $match)) {
        return $match[1];
    }

    return null;
}

/**
 * Finds if the result has documented parts in the docblock
 *
 * @param  string $dockblock
 * @return bool
 */
function is_documented_array_type_result($dockblock)
{
    return (bool)strpos($dockblock, '@returns');
}

/**
 * Finds if the parameter type is numeric
 *
 * @param  string $type
 * @return bool
 */
function is_numeric_type($type)
{
    static $numeric_types = array('float', 'int', 'int|bool', 'int|float');

    return in_array($type, $numeric_types);
}
