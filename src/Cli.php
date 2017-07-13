<?php

namespace Braingames\Cli;

use function \cli\line;

const ANSWERS_COUNT = 3;

function run()
{
    line('Welcome to the Brain Games!');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);
}

function printGreeting($string)
{
    line('Welcome to the Brain Games!');
    line($string);
}

function promptUser()
{
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);

    return $name;
}

function printSuccessMessage($name)
{
    line("Congratulations, %s", $name);
}

function printFailMessage($answer, $name, $number)
{
    line("%s is wrong answer ;(. Correct answer was %s", $answer, getRightAnswer($number));
    line("Let's try again, %s", $name);
}

function play($getQuestionFunc, $getRightAnswerFunc)
{
    $name = promptUser();

    $rightAnswers = 0;
    $exit = false;

    while ($rightAnswers < ANSWERS_COUNT && !$exit) {
        $question = $getQuestionFunc();
        line('Question: ' . $question);
        $answer = \cli\prompt("Your answer is");
        if ($answer == $getRightAnswerFunc($question)) {
            line('Correct!');
            line();
            $rightAnswers++;
            continue;
        }

        line("%s is wrong answer ;(. Correct answer was %s", $answer, $getRightAnswerFunc($question));
        line("Let's try again, %s", $name);
        $exit = true;
    }

    if ($rightAnswers == ANSWERS_COUNT) {
        printSuccessMessage($name);
    }
}
