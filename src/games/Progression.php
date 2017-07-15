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
        $numbers = explode(' ', $question);

        $missedNumberPos = array_search('..', $numbers);

        if ($missedNumberPos === 0) {
            $step = $numbers[2] - $numbers[1];
            return $numbers[1] - $step;
        }

        if ($missedNumberPos === 1) {
            $step = $numbers[3] - $numbers[2];
            return $numbers[2] - $step;
        }

        if ($missedNumberPos === PROGRESSION_LENGTH - 1) {
            $step = $numbers[PROGRESSION_LENGTH - 2] - $numbers[PROGRESSION_LENGTH - 3];
            return $numbers[PROGRESSION_LENGTH - 2] + $step;
        }

        $step = $numbers[1] - $numbers[0];
        $first = $numbers[0];

        return $first + $step * $missedNumberPos;
    };

    play(GREETING, $question, $getRightAnswer);
}

function generateProgressionWithMissedNumber($first, $step, $missedNumberPos)
{
    $progressionString = '';
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        if ($i == $missedNumberPos) {
            $progressionString .= '.. ';
        } else {
            $progressionString .= $first + $i * $step . ' ';
        }
    }

    return $progressionString;
}
