<?php

namespace Braingames\Games\Calc;

use function \cli\line;

const ANSWERS_COUNT = 3;

function run()
{
    line('Welcome to the Brain Games!');
    line('What is the result of the expression?');
    line();

    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);

    for ($i = 1; $i <= ANSWERS_COUNT; $i++) {
        $signs = ['+', '-', '*'];
        $sign = $signs[array_rand($signs)];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);

        $expression = getRandomExpression($sign, $number1, $number2);
        line('Question: ' . $expression);
        $answer = \cli\prompt("Your answer is");
        if ($answer == getRightAnswer($sign, $number1, $number2)) {
            line('Correct!');
            line();
        } else {
            line("%s is wrong answer ;(. Correct answer was %s", $answer, getRightAnswer($sign, $number1, $number2));
            line("Let's try again, %s", $name);
            exit();
        }
    }

    line("Congratulations, %s", $name);
}

function getRightAnswer($sign, $number1, $number2)
{
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
}

function getRandomExpression($sign, $number1, $number2)
{
    return $number1 . ' ' . $sign . ' ' . $number2;
}
