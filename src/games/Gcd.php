<?php

namespace Braingames\Games\Gcd;

use function \Braingames\Cli\printGreeting;
use function \Braingames\Cli\play;

const GREETING = 'Find the greatest common divisor of given numbers.';

function run()
{
    $question = function () {
        return rand(1, 100) . ' ' . rand(1, 100);
    };

    $rightAnswer = function ($question) {
        list($number1, $number2) = explode(' ', $question);

        $gcd = function($number1, $number2) use (&$gcd) {
            $remainder = $number1 > $number2 ? $number1 % $number2 : $number2 % $number1;
            if($remainder == 0) {
                return $number2;
            }
            return $gcd($number2, $remainder);
        };

        return $gcd($number1, $number2);
    };

    printGreeting(GREETING);
    play($question, $rightAnswer);
}
