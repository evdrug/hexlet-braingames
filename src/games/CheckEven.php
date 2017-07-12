<?php

namespace Braingames\Games\CheckEven;

use function \cli\line;

const ANSWERS_COUNT = 3;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    line();

    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);

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

    line("Congratulations, %s", $name);
}

function getRightAnswer($number)
{
    return $number % 2 == 0 ? "yes" : "no";
}
