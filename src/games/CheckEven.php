<?php

namespace Braingames\Games\CheckEven;

use function \Braingames\Cli\play;

const GREETING = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $question = function () {
        return rand(1, 100);
    };

    $getRightAnswer = function ($number) {
         return isEven($number) ? "yes" : "no";
    };

    play(GREETING, $question, $getRightAnswer);
}

function isEven($number)
{
    return $number % 2 == 0;
}
