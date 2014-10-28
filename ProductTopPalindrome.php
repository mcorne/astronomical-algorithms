<?php
/**
 * Calculation of the palindrome of a product of tow factors
 */
class ProductTopPalindrome
{
    /**
     * The stack of palindrome candidates
     * reverse sorted by product
     * ex. array(array('a' => 9, 'b' => 9, 'p' => 81), ...)
     *
     * @var array
     */
    public $candidates = array();

    /**
     * The error message
     *
     * @var string
     */
    public $errorMessage;

    /**
     * The number of iterations to calculate the palindrome
     *
     * @var int
     */
    public $iterations;

    /**
     * The calculated palindrome
     * used mainly for reporting purposed
     * ex. array('a' => 9, 'b' => 9, 'p' => 81)
     *
     * @var array
     */
    public $palindrome;

    /**
     * The beginning of the range of factors
     *
     * @var int
     */
    public $rangeBegin;

    /**
     * The time taken to calculate the palindrome
     * in seconds rounded to 3, ex. 0.123
     *
     * @var string
     */
    public $time;

    /**
     * Calculates the palindrome
     *
     * @param int $rangeEnd     The end of the range of factors, ex. 999
     * @param int $rangeBegin   The beginning of the range of factors, ex. 100, default = 1
     * @return array|false|null The palindrome as an array, ex. array('a' => 99, 'b' => 91, 'p' => 9009),
     *                          or false in case of error, or null if there is no palindrome
     */
    public function calculatePalindrome($rangeEnd, $rangeBegin = null)
    {
        $this->time = microtime(true);

        $this->candidates = array();
        $this->iterations = 0;
        $this->rangeBegin = is_null($rangeBegin)? 1 : (int) $rangeBegin;
        $rangeEnd = (int) $rangeEnd;

        if (! $this->isValidRange($rangeEnd, $this->rangeBegin)) {
            return false;
        }

        $product = $rangeEnd * $rangeEnd;

        if (! is_int($product)) {
            $this->errorMessage = "The product $rangeEnd * $rangeEnd is too large for this machine.";
            return false;
        }

        // initialises the stack of candidates
        $this->insertCandidate(array(
            'a' => $rangeEnd,
            'b' => $rangeEnd,
            'p' => $product));

        while ($candidate = $this->getNextCandidate()) {
            $this->iterations++;

            if ($this->isPalindrome($candidate['p'])) {
                $this->palindrome = $candidate;
                break;
            }
        }

        $this->time = round((microtime(true) - $this->time), 3);

        return $candidate;
    }

    /**
     * Returns the next candidate
     *
     * @return array|null The palindrome as an array, ex. array('a' => 99, 'b' => 91, 'p' => 9009),
     *                    or null if there is no more candidate
     */
    public function getNextCandidate()
    {
        $candidate = array_shift($this->candidates);

        if (isset($candidate)) {
            $nextFactorA = $candidate['a'] - 1;

            if ($candidate['b'] == $nextFactorA and $nextFactorA >= $this->rangeBegin) {
                // inserts the next factor A candidate, always a square, ex. array('a' => 8, 'b' => 8, 'p' => 64)
                $this->insertCandidate(array(
                    'a' => $nextFactorA,
                    'b' => $nextFactorA,
                    'p' => $nextFactorA * $nextFactorA));
            }

            $nextFactorB = $candidate['b'] - 1;
            // calculates the next candidate product by substracting the factor A from the current candidate product
            $product = $candidate['p'] - $candidate['a'];

            if ($product >= $candidate['a'] and $nextFactorB >= $this->rangeBegin) {
                // inserts the next factor B candidate
                $this->insertCandidate(array(
                    'a' => $candidate['a'],
                    'b' => $nextFactorB,
                    'p' => $product));
            }
        }

        return $candidate;
    }

    /**
     * Inserts a new candidate in the stack so the stack is reverse sorted by product
     * The top of the stack is the next candidate
     *
     * @param array $newCandidate
     */
    public function insertCandidate($newCandidate)
    {
        $candidates = array();

        foreach($this->candidates as $candidate) {
            if (isset($newCandidate) and $newCandidate['p'] > $candidate['p'] or $newCandidate['p'] == $candidate['p'] and $newCandidate['a'] > $candidate['a']) {
                $candidates[] = $newCandidate;
                // marks the new candidate as inserted
                $newCandidate = null;
            }

            $candidates[] = $candidate;
        }

        if (isset($newCandidate)) {
            // the new candidate is not inserted yet
            $candidates[] = $newCandidate;
        }

        $this->candidates = $candidates;
    }

    /**
     * Checks wether the number is a palindrome or not
     *
     * @param int $number
     * @return boolean
     */
    public function isPalindrome($number)
    {
        $number = (string) $number;

        for ($i = 0, $j = strlen($number) - 1; $i < $j; $i++, $j--) {
            if ($number[$i] != $number[$j]) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validates the factor range
     *
     * @param int $rangeEnd
     * @param int $rangeBegin
     * @return boolean
     */
    public function isValidRange($rangeEnd, $rangeBegin)
    {
        if ($rangeEnd <= 0) {
            $this->errorMessage = 'The end of the range must be a positive non null integer.';
            return false;
        }

        if ($rangeBegin <= 0 or $rangeBegin > $rangeEnd) {
            $this->errorMessage = "The beginning of the range must be a positive non null integer, lower than $rangeEnd";
            return false;
        }

        return true;
    }

    /**
     * Pretty prints a palindrome candidate
     *
     * @param array $candidate
     * @return string
     */
    public function printCandidate($candidate)
    {
        return sprintf('%d * %d = %d', $candidate['a'], $candidate['b'], $candidate['p']);
    }

    /**
     * Prints the calculation report
     *
     * @return array
     */
    public function printReport()
    {
        return array(
            'palindrome' => isset($this->palindrome)? $this->printCandidate($this->palindrome) : 'none',
            'iterations' => $this->iterations,
            'time'       => $this->time,
            'stack'      => array_map(array($this, 'printCandidate'), $this->candidates),
            'error'      => $this->errorMessage,
        );
    }
}