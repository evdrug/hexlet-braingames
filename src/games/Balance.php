<?php

namespace Braingames\Games\Balance;

use function \Braingames\Cli\play;

const GREETING = 'What is the result of the expression?';

function run()
{
    $question = function () {
        return rand(10, 1000);
    };

    $getRightAnswer = function ($question) {
        return balanceNumber($question);
    };

    play(GREETING, $question, $getRightAnswer);
}

function balanceNumber($number)
{
    $digits = str_split(strval($number));
    sort($digits);

    if (isBalanced($digits)) {
        return implode($digits);
    }

    $first = $digits[0];
    $last = $digits[count($digits) - 1];

    $rest = array_slice($digits, 1, -1);

    $avg = ($first + $last) / 2;

    $balancedFirst = floor($avg);
    $balancedLast = ceil($avg);

    return balanceNumber(implode(
        array_merge(
            array($balancedFirst),
            $rest,
            array($balancedLast)
        )
    ));
}

function avgOfDigits($digits)
{
    return array_sum($digits) / count($digits);
}

function isBalanced($digits)
{
    $counter = 0;
    foreach ($digits as $digit) {
        if (abs($digit - avgOfDigits($digits)) >= 1) {
            $counter++;
        }
    }
    return $counter > 0 ? false : true;
}
