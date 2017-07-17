<?php
namespace Braingames\Games\Progression;

use function \Braingames\Cli\play;

const GREETING = 'What number is missing in this progression?';
const PROGRESSION_LENGTH = 10;

function run()
{
    $question = function () {
        $step = rand(1, 11);
        $missedNumberPos = rand(0, PROGRESSION_LENGTH - 1);
        $first = rand(1, 100);

        return generateProgressionWithMissedNumber($first, $step, $missedNumberPos);
    };

    $getRightAnswer = function ($question) {
        $progression = explode(' ', $question);

        return findMissedNumber($progression);
    };

    play(GREETING, $question, $getRightAnswer);
}

function generateProgressionWithMissedNumber($first, $step, $missedNumberPos)
{
    $progressionString = '';
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $progressionString .= $i == $missedNumberPos ? '.. ' : $first + $i * $step . ' ';
    }

    return $progressionString;
}

function findMissedNumber($progression)
{
    $missedNumberPos = array_search('..', $progression);

    if ($missedNumberPos === 0) {
        $step = $progression[2] - $progression[1];
        return $progression[1] - $step;
    }

    if ($missedNumberPos === 1) {
        $step = $progression[3] - $progression[2];
        return $progression[2] - $step;
    }

    if ($missedNumberPos === PROGRESSION_LENGTH - 1) {
        $step = $progression[PROGRESSION_LENGTH - 2] - $progression[PROGRESSION_LENGTH - 3];
        return $progression[PROGRESSION_LENGTH - 2] + $step;
    }

    $step = $progression[1] - $progression[0];
    $first = $progression[0];

    return $first + $step * $missedNumberPos;
}
