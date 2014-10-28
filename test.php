<?php
/*
 * Unit tests of the ProductTopPalindrome class methods
 *
 * run as CLI : php test.php
 * run as HTTP: http://http://micmap.org/palindrome/test.php
 */

require 'ProductTopPalindrome.php';

class ProductTopPalindrome_Test
{
    public function assertSame($expected, $actual, $message = null)
    {
        if ($expected !== $actual) {
            echo "\nerror!\n";
            print_r(array(
                'expected' => $expected,
                'actual'   => $actual,
                'message'  => $message,
            ));
            exit;
        }

        echo ' .';
    }

    public function testIsValidRange()
    {
        echo __FUNCTION__;
        $palindrome = new ProductTopPalindrome();

        $this->assertSame(
            true,
            $palindrome->isValidRange(999, 100),
            'valid range');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isValidRange(0, 1),
            'invalid range, null range end');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isValidRange(-1, 1),
            'invalid range, negative range end');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isValidRange(2, 0),
            'invalid range, null range beginning');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isValidRange(2, -1),
            'invalid range, negative range beginning');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isValidRange(1, 2),
            'invalid range, range beginning greater than range end');

        echo "\n";
    }

    public function testInsertCandidate()
    {
        echo __FUNCTION__;
        $palindrome = new ProductTopPalindrome();

        /**********/

        $candidate1 = array('a' => 9, 'b' => 9, 'p' => 81);
        $palindrome->insertCandidate($candidate1);
        $this->assertSame(
            array($candidate1),
            $palindrome->candidates,
            '1 candidate');

        /**********/

        $candidate2 = array('a' => 9, 'b' => 7, 'p' => 63);
        $palindrome->insertCandidate($candidate2);
        $this->assertSame(
            array($candidate1, $candidate2),
            $palindrome->candidates,
            'candidate 2 after candidate 1');

        /**********/

        $candidate3 = array('a' => 9, 'b' => 8, 'p' => 72);
        $palindrome->insertCandidate($candidate3);
        $this->assertSame(
            array($candidate1, $candidate3, $candidate2),
            $palindrome->candidates,
            'candidate 3 between candidates 1 and 2');

        echo "\n";
    }

    public function testGetNextCandidate()
    {
        echo __FUNCTION__;
        $palindrome = new ProductTopPalindrome();

        /**********/

        $this->assertSame(
            null,
            $palindrome->getNextCandidate(),
            'no candidate');

        /**********/

        $palindrome->candidates = array(
            array('a' => 9, 'b' => 9, 'p' => 81),
        );

        $this->assertSame(
            array('a' => 9, 'b' => 9, 'p' => 81),
            $palindrome->getNextCandidate(),
            'get candidate 1');

        $this->assertSame(
            array(array('a' => 9, 'b' => 8, 'p' => 72)),
            $palindrome->candidates,
            'next factor A candidate added');

        /**********/

        $this->assertSame(
            array('a' => 9, 'b' => 8, 'p' => 72),
            $palindrome->getNextCandidate(),
            'get candidate 2');

        $this->assertSame(
            array(
                array('a' => 8, 'b' => 8, 'p' => 64),
                array('a' => 9, 'b' => 7, 'p' => 63),
            ),
            $palindrome->candidates,
            'next factor B candidate added, next factor A candidate added');

        /**********/

        $palindrome->rangeBegin = 8;

        $this->assertSame(
            array('a' => 8, 'b' => 8, 'p' => 64),
            $palindrome->getNextCandidate(),
            'get candidate 3');

        $this->assertSame(
            array(array('a' => 9, 'b' => 7, 'p' => 63)),
            $palindrome->candidates,
            'no candidates added as factor below range');

        /**********/

        $this->assertSame(
            array('a' => 9, 'b' => 7, 'p' => 63),
            $palindrome->getNextCandidate(),
            'get candidate 4');

        $this->assertSame(
            array(),
            $palindrome->candidates,
            'no more canditate in store');

        /**********/

        $this->assertSame(
            null,
            $palindrome->getNextCandidate(),
            'no next candidate');

        echo "\n";
    }

    public function testIsPalindrome()
    {
        echo __FUNCTION__;
        $palindrome = new ProductTopPalindrome();

        /**********/

        $this->assertSame(
            true,
            $palindrome->isPalindrome(5),
            '1 digit palindrome');

        /**********/

        $this->assertSame(
            true,
            $palindrome->isPalindrome(1221),
            'palindrome with pair number of digits');

        /**********/

        $this->assertSame(
            true,
            $palindrome->isPalindrome(12321),
            'palindrome with odd number of digits');

        /**********/

        $this->assertSame(
            false,
            $palindrome->isPalindrome(123),
            'not a palidrome');

        echo "\n";
    }

    public function testCalculatePalindrome()
    {
        echo __FUNCTION__;
        $palindrome = new ProductTopPalindrome();

        /**********/

        $this->assertSame(
            array('a' => 9, 'b' => 1, 'p' => 9),
            $palindrome->calculatePalindrome(9),
            '1 digit factor palindrome');

        /**********/

        $this->assertSame(
            null,
            $palindrome->calculatePalindrome(9, 7),
            'no palindrome with range beginning');

        /**********/

        $this->assertSame(
            array('a' => 99, 'b' => 91, 'p' => 9009),
            $palindrome->calculatePalindrome(99),
            '2 digit factor palindrome');

        /**********/

        $this->assertSame(
            array('a' => 993, 'b' => 913, 'p' => 906609),
            $palindrome->calculatePalindrome(999),
            '3 digit factor palindrome');

        /**********/

        $this->assertSame(
            false,
            $palindrome->calculatePalindrome(99999),
            'range end too large for machine');

        /**********/

        $this->assertSame(
            false,
            $palindrome->calculatePalindrome(0),
            'invalid range');


        echo "\n";
    }
}

$test = new ProductTopPalindrome_Test();
stripos(PHP_SAPI, 'cli') === false and print "<pre>\n";
$test->testIsValidRange();
$test->testInsertCandidate();
$test->testGetNextCandidate();
$test->testIsPalindrome();
$test->testCalculatePalindrome();
