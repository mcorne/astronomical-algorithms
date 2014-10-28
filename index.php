<?php
/*
 * CLI or HTTP basic interface to calculate the palindrome within a range of factors
 *
 * CLI examples: php index.php <range end> [range begin]
 * php index.php 999
 * php index.php 99 10
 *
 * HTTP examples: http://http://micmap.org/palindrome/?end=<range end>&begin=[range begin]
 * http://http://micmap.org/palindrome/?end=999
 * http://http://micmap.org/palindrome/?end=99&begin=10
 */

if (stripos(PHP_SAPI, 'cli') === false) {
    $rangeEnd   = isset($_GET['end'])   ? $_GET['end'] : null;
    $rangeBegin = isset($_GET['begin']) ? $_GET['begin'] : null;
    $isCli = false;

} else {
    $rangeEnd   = isset($argv[1]) ? $argv[1] : null;
    $rangeBegin = isset($argv[2]) ? $argv[2] : null;
    $isCli = true;
}

require 'ProductTopPalindrome.php';

$palindrome = new ProductTopPalindrome();
$palindrome->calculatePalindrome($rangeEnd, $rangeBegin);

$isCli or print"<pre>\n";
print_r($palindrome->printReport());

// this is a change

// this is another change