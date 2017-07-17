<?php
namespace Braingames\Games\Prime;

use function \Braingames\Cli\play;

const GREETING = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $question = function () {
        return rand(1, 100);
    };

    $getRightAnswer = function ($number) {
         return isPrime($number) ? "yes" : "no";
    };

    play(GREETING, $question, $getRightAnswer);
}

function isPrime($number)
{
    if (isEven($number)) {
        return false;
    }

    for ($i = 3; $i <= $number/2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function isEven($number)
{
    return $number % 2 == 0;
}
