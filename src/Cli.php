<?php

namespace Braingames\Cli;

use function \cli\line;

function run()
{
    line('Welcome to the Brain Games!');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s", $name);
}

function printHeading($string)
{
    line('Welcome to the Brain Games!');
    line($string);
}

function printSuccessMessage($name)
{
    line("Congratulations, %s", $name);
}

function printFailMessage($name)
{

}
