<?php

namespace Braingames\Games\CheckEven;

use function \Braingames\Cli\printGreeting;
use function \Braingames\Cli\play;

const GREETING = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $question = function () {
        return rand(1, 100);
    };

    $rightAnswer = function ($number) {
        $isEven = function ($number) {
            return $number % 2 == 0;
        };
         return $isEven($number) ? "yes" : "no";
    };

    printGreeting(GREETING);
    play($question, $rightAnswer);
}
