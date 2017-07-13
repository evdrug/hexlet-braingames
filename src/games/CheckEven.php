<?php

namespace Braingames\Games\CheckEven;

use function \cli\line;
use function \Braingames\Cli\printHeading;
use function \Braingames\Cli\printSuccessMessage;

const ANSWERS_COUNT = 3;

function run()
{
    printHeading('Answer "yes" if number even otherwise answer "no".');

    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);

    while()

    for ($i = 1; $i <= ANSWERS_COUNT; $i++) {
        $number = rand(1, 100);
        line('Question: ' . $number);
        $answer = \cli\prompt("Your answer is");
        if ($answer == getRightAnswer($number)) {
            line('Correct!');
            line();
        } else {
            line("%s is wrong answer ;(. Correct answer was %s", $answer, getRightAnswer($number));
            line("Let's try again, %s", $name);
            exit();
        }
    }

    printSuccessMessage($name);
}

function getRightAnswer($number)
{
    isEven($number) ? "yes" : "no";
}

function isEven($number)
{
    return $number % 2 == 0;
}
