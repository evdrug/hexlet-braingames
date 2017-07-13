<?php

namespace Braingames\Games\Calc;

use function \Braingames\Cli\printGreeting;
use function \Braingames\Cli\play;

const GREETING = 'What is the result of the expression?';

function run()
{
    $question = function () {
        $signs = ['+', '-', '*'];
        $sign = $signs[array_rand($signs)];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        return "{$number1} {$sign} {$number2}";
    };

    $rightAnswer = function ($question) {
        list($number1, $sign, $number2) = explode(' ',$question);

        switch ($sign) {
            case '+':
                return $number1 + $number2;
                break;
            case '-':
                return $number1 - $number2;
                break;
            case '*':
                return $number1 * $number2;
                break;
        }
    };

    printGreeting(GREETING);
    play($question, $rightAnswer);
}
